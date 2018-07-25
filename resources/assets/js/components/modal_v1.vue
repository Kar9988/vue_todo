<template>
    <el-container>
        <el-button id="button" @click="showModal = !showModal">Modal</el-button>

        <el-main id="befMod"v-if="showModal">
            <el-row type="flex" justify="center">
                <el-col :sm ='12' id="mod">
                    <el-button id="close" @click="showModal = !showModal">X</el-button>

                        <h1>What is Lorem Ipsum?</h1>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                            and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                </el-col>
            </el-row>
        </el-main>
    </el-container>

</template>

<script>
    export default {
        name: "ToDo",
        data(){
            return{
                showModal: false

            }
        }
    }

</script>

<style>
    #befMod{
        background-color: rgba(0, 0, 0, .5);
        z-index: 10000;
        position: fixed;

    }
    #button{
        position: absolute;
        z-index: -1;
    }
    #mod{
        background-color:  #fff;
        padding: 20px;
        transition: opacity .3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        border-radius: 10px;
    }
    #close{
        border-radius: 110px;
        float:right;
    }
</style>