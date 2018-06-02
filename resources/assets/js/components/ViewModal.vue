<template>
    <div class="modal fade" id="viewmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title has-text-black float-lg-left">View</h4>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item">{{sendId.id}}:&nbsp{{sendId.name}}</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</template>

<script type="text/javascript">
    export default{

        props:['sendId'],

        data()
        {
            return {

                val:{},
                 id:this.sendId,
            }
        },
        computed:
        {
           change:function () {
               console.log("i am changed");
           }

        },
        methods:{
               getData()
               {
                    console.log(this.sendId);
                   axios.get('http://127.0.0.1:8000/tasks/'+this.sendId)
                       .then(response=>{
                           this.val=response.data;
                           console.log(this.val);

                       })
                       .catch(error=>console.log(error.data));
               },
        },

    }
</script>

<style scoped>

</style>