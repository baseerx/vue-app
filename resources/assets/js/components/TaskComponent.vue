<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header text-danger">Task Component <button class="float-xl-right btn-success btn btn-sm"><span><i class="fa fa-plus"></i></span></button></div>

                    <div class="card-body">
                       <ul class="list-group">
                           <li class="list-group-item" v-for="t in tasks.data">
                              {{t.id}} &nbsp; {{t.name}}
                               <span><button class="btn btn-sm float-xl-right ml-lg-3 btn-danger">delete</button><button class="btn-dark btn btn-sm float-xl-right ml-lg-3">Edit</button><button class="btn-info btn btn-sm float-xl-right ml-lg-3">View</button></span>
                           </li>
                       </ul>
                        <pagination :data="tasks" v-on:pagination-change-page="getResults"></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    Vue.component('pagination', require('laravel-vue-pagination'));
    export default {
        data()
        {
            return {
                tasks:{},
            }
        },
        methods: {
            // Our method to GET results from a Laravel endpoint
            getResults(page) {
                if (typeof page === 'undefined')
                {
                    page=1;
                }
                axios.get('http://127.0.0.1:8000/tasks?page=' + page)
                    .then(response => {
                        this.laravelData = response.data;
                    });
            }
        },
        created()
        {
            axios.get('http://127.0.0.1:8000/tasks')
                .then((response)=>this.tasks=response.data)
                .catch((error)=>console.log(error));
        }
    }
</script>

<style scoped>

</style>