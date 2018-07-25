<template>

    <el-container>
        <el-main>
            <el-row type="flex" justify="center">
                <el-col :sm='12' id="mod">
                    <el-input name="name" v-model="newTask"></el-input>
                    <el-button v-on:click="setTask">Add</el-button>


                    <ul class="el-menu navbar__menu" placeholder="Select">
                        <transition name="slide-fade">
                            <li class="el-menu-item" v-for="task in test" v-if="!task.completed">
                                <input type="hidden">
                                <transition name="fade" mode="out-in">
                                    <!-- ... кнопки ... -->
                                <el-button class="but" v-if="!task.status" v-on:click="doneTask(task)" type="search" icon="el-icon"
                                           circle></el-button>
                                <el-button class="but" effect="dark" v-if="task.status" v-on:click="doneTask(task)" type="success"
                                           icon="el-icon-check" circle></el-button>
                                </transition>
                                <el-button class="but destroy" type="danger" v-on:click="destroy(task.id)" icon="el-icon-delete" circle></el-button>


                                {{task.name}}
                            </li>
                        </transition>
                    </ul>
                </el-col>


            </el-row>
        </el-main>
    </el-container>


</template>

<script>
    export default {
        name: "todo",
        data() {
            return {
                newTask: '',
                tasks: [
                    {task: ''}
                ],
                allTasks: [],
                newButton: true,
                doneButton: false,
                test: []

            }
        },
        created() {
            this.getTasks()
        },


        methods: {
            getTasks() {
                axios.get('/tasks/all').then(response => {
                    this.test = response.data
                    // console.log(JSON.parse(this.test));
                });
            },


            setTask() {
                this.tasks.task = this.newTask;
                this.allTasks.push(this.tasks.task);

                axios.post('/task/set', {
                    contentType: "json",
                    data: this.tasks.task
                }).then(response=>{
                    this.test = response.data
                });

                this.newTask = ''

            },
            doneTask(task) {
                axios.post('/task/done/',task )
                    .then(response => {
                        this.test = response.data
                    })
            },

            destroy(id){
                axios.delete('/tasks/destroy/'+id)
                    .then(response => {
                        this.test = response.data
                    })
            }
        }
    }
</script>

<style>
    .slide-fade-enter-active {
        transition: all .3s ease;
    }
    .slide-fade-leave-active {
        transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to
        /* .slide-fade-leave-active до версии 2.1.8 */ {
        transform: translateX(10px);
        opacity: 0;
    }
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
        opacity: 0;
    }
    li {
        list-style: none;
    }
    .but{
        position: relative;
    }
    .destroy{
        float: right;
        margin-right: 10px;
        margin-top: 13px;
    }
    .but i{
        top: 4px;
        left: 0px;
        position: absolute;
    }
</style>