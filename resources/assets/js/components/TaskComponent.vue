<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header text-danger">Task Component <a class="float-xl-right btn-success btn btn-sm" href="#addmodal" data-toggle="modal"><span><i class="fa fa-plus"></i></span></a></div>

                    <div class="card-body">
                       <ul class="list-group">
                           <li class="list-group-item" v-for="t in tasks.data">
                              {{t.id}} &nbsp; {{t.name}}
                               <span><button class="btn btn-sm float-xl-right ml-lg-3 btn-danger" @click="deleteme(t.id)">delete</button><a class="btn-dark btn btn-sm float-xl-right ml-lg-3" href="#updatemodal" data-toggle="modal" @click="updatebtn(t)">Edit</a><a class="btn-info btn btn-sm float-xl-right ml-lg-3" href="#viewmodal" data-toggle="modal" @click="viewshow(t)">View</a></span>
                           </li>
                       </ul>
                        <pagination :data="tasks" class="mt-2 pagination" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal">
            <addtask @value="taskcalled"></addtask>
            <viewmodal :sendId="showActive"></viewmodal>
            <updatemodal :sendId="updateActive"></updatemodal>
        </div>
    </div>
</template>

<script>
    // Problem is here by adding this below line

    export default {
        data()
        {
            return {
                tasks:{},
                showActive:0,
                updateActive:0,

            }
        },
        mounted()
            {
               this.getResults();
            },
        methods: {
            // Our method to GET results from a Laravel endpoint
            getResults(page) {
                if (typeof page === 'undefined')
                {
                    page=1;
                }
                axios.get('http://127.0.0.1:8000/tasks?page=' + page)
                    .then((response) => this.tasks=response.data)
                    .catch((error)=>console.log(error));
            },
            taskcalled(data)
            {
                this.tasks=data.data

            },
            viewshow(val)
            {
                   this.showActive=val//        Log::info("you are in");
;
            },
            updatebtn(id)
            {
                this.updateActive=id;
            },
            close()
            {
                this.updateActive='';
            },
            deleteme(id)
            {
                const reply=confirm("are you sure? you want to delete this record");
                if (reply)
                {
                    axios.delete('http://127.0.0.1:8000/tasks/'+id,{
                        id:id,


                    })
                        .then((response)=>{
                            console.log(response.data);
                        })
                        .catch((error)=>console.log(error));
                }

                location.reload();
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