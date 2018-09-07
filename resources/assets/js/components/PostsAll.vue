<template>
    <div class="col-8 mx-auto">
        <div class="card mx-auto mt-0 my-2" v-for="(value, key) in  this.$props.posts" v-bind:key="key">
            <div class="card-body mb-0">
                <div class="row">
                    <img v-bind:src="getUserGender(value.user_id) === 'male' ? 'images/male-user.png':'images/female-user.png'" class="rounded-circle" style="width:48px;height:48px;margin:4px 12px" />
                    <div>
                        <h5 class="card-title mb-0">{{ this.getUserName(value.user_id) }}</h5>
                        <label class="card-date text-muted" >{{ value.created_at }} <span class="fa fa-globe"></span></label>
                    </div>
                </div>
                <p class="card-text text-align-left">{{value.body}}</p>
                <div class="row">
<!--                     <form method="POST" v-bind:action="'/posts/' + {{ value.id }} + '/like'" class="col-6">
                        <input type="hidden" name="_token" :value="csrf">
                        <button type="submit" class="btn btn-light form-control"><span class="fa fa-heart"></span> {{ count($post->likes) }}</button>
                    </form>
                    <form method="POST" v-bind:action="'/posts/' + {{ value.id }}" class="col-6" >
                        <input type="hidden" name="_token" :value="csrf">
                        <button type="submit" class="btn btn-light form-control"><span class="fa fa-comment"></span></button>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'create-post',
    props: [
        'posts'
    ],
    data() {
        return {

            csrf : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    methods: {
        getUserGender(id) {

            this.$http.get('/users/' + id  + '/gender').then(response => {
                return response.body['gender'];
            }, response => {
                console.log('error');
            });
        },

        getUserName(id) {

            this.$http.get('/users/' + id  + '/name').then(response => {
                return response.body['name'];
            }, response => {
                console.log('error');
            });
        }
    },
}
</script>

<style scoped>

</style>
