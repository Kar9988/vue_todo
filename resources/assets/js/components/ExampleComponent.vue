<template xmlns:>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Vue Lessons</div>

                    <div class="card-body">
                        <ul v-for="post in posts">
                            <li>{{post.id}}</li>
                            <li>{{post.name}}</li>
                            <li>{{post.email}}</li>
                            <hr>
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
   import axios from 'axios';

   export default {
       data: () => ({
        posts:[],
        errors:[],
           item:''
   }),
       created(){
           axios.get("/axios").then(response =>{
               this.posts = response.data

           })
               .catch(e=>{
                   this.errors.push(e)
               })
       },
       // methods:{
       //     resReturn(){
       //         this.posts
       //     }
       // }

   }
</script>