<template>
    <div class="container">
        <div class="row">
            <div class="col d-flex">
                <input type="text" class="form-control" v-model="roomname">
                <button type="button" class="btn btn-success" @click="createRoom()">NewRoom</button>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-success" @click="showRoom()">ShowRoom</button>
            </div>
        </div>
        
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                key: "Hola mundo",
                roomname: ''
            }
        },
        methods: {
            createRoom() {
                if(this.roomname == ''){
                    alert('Vacio')
                    return false
                }

                console.log('New room')
                axios.post('/api/createroom', {
                    roomname: this.roomname
                })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            },

            showRoom(){
                axios.get('/api/showroom')
                .then(function (response) {
                    // handle success
                    console.dir(response.data);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>