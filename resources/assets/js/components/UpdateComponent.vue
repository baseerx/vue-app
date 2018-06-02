<template>
    <div class="modal fade" id="updatemodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title has-text-black float-lg-left">{{sendId.name}}'s UpdateName</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success" v-if="datacheck.length>0" v-html="message"></div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" autofocus v-model="sendId.name" :placeholder="placeholdername" class="form-control-sm">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"    @click="updateme()">Update</button>
                    <button type="button" class="btn btn-default" :data-dismiss='closeme' @click="closed()">Close</button>
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
                name:'',
                closeme:'',
                datacheck:'',
                message:'',
                placeholdername:'',
            }
        },
            watch:
            {


            },
        mounted()
        {
          console.log("updatemodal mounted");
        },
        methods:{
            getData()
            {
                console.log(this.sendId);
                axios.get('http://127.0.0.1:8000/tasks/'+this.sendId.id)
                    .then(response=>{
                        this.val=response.data;
                        console.log(this.val);

                    })
                    .catch(error=>console.log(error.data));
            },
            updateme()
            {
                  this.placeholdername=this.name;
                axios.post('http://127.0.0.1:8000/tasks/'+this.sendId.id,{
                    'name':this.sendId.name,
                    '_method':'PUT',
                }).then((response)=>{

                    this.datacheck=response.data;
                    this.message='record added successfully';

                }).catch(error=>console.log(error));

                // location.reload();
                this.name='';
                // location.reload();
                // this.closeme='modal';

              //  this.$emit('close');
            },
            closed()
            {
                this.closeme='modal';
                this.message='';
                location.reload();
            }
        },

    }
</script>

<style scoped>

</style>