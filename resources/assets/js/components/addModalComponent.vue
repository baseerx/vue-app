<template>
   <div class="modal fade" id="addmodal" :class="{active:invisible}">
   	<div class="modal-dialog">
   		<div class="modal-content">
   			<div class="modal-header">
				<h4 class="modal-title has-text-black float-lg-left">Add New</h4>
   				<button type="button" class="close ml-5" @click="closemodal" data-dismiss="modal" aria-hidden="true"><span><i class="fa fa-times"></i></span></button>
   			</div>
   			<div class="modal-body">
				<p class="alert alert-success" v-if="success .length > 0">{{success}}</p>
				<label for="name">Name: {{record}}</label>
				<input type="text" name="name" id="name" class="form-control" v-model="record" autofocus>
                <ul v-if="error.name" class="list-unstyled">
                    <li class="alert-danger alert" v-for="err of error">{{err}}</li>
                </ul>
   			</div>
   			<div class="modal-footer">
   				<button type="button" class="btn btn-default" @click="closemodal" data-dismiss="modal">Close</button>
   				<button type="button" class="btn btn-primary"  @click="addRecord()">Save changes</button>
   			</div>
   		</div><!-- /.modal-content -->
   	</div><!-- /.modal-dialog -->
   </div><!-- /.modal -->

</template>

<script type="text/javascript">
    export default{

        data()
        {
            return {
                record:'',
				success:'',
				invisible:false,
				error:[],
            }
        },
		methods:{
            addRecord()
			{
			    axios.post('http://127.0.0.1:8000/tasks',{
			        'name':this.record,
				})
					.then(data=>{
                        this.$emit('value',data);
                         this.success="task has been successfully added";
					})
					.catch(error=>{
                        this.error=error.response.data.errors;
                    })


				this.record=""

			},
            closemodal()
            {
                this.error="",
                this.success=""
            }
		}
    }
</script>

<style scoped>

</style>