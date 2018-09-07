<template>
    <div class="card">
        <div class="card-header">Profile</div>

        <div class="card-body">
            <table class="table table-hover table-dark">
                <tbody >
                    <form ref="form" method="POST" action="/profile/edit">
                        <input type="hidden" name="_token" :value="csrf">
                    <tr v-for="d in this.det" v-bind:key="d.key" ref="detail">
                        <td>{{d.key}}</td>
                        <td>
                        <input v-bind:type="d.type" v-model="d.value" v-bind:name="d.key" v-bind:disabled="!d.edit" class="bg-dark text-white border border-0" >
                        <button type="button" class="btn btn-primary btn-sm py-0" v-on:click="onClick(d.index)" >{{d.edit ? 'save':'edit'}}</button>
                        </td>
                    </tr>    
                    </form>    
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: 'profile-edit',
    props: [
        'details',
    ],
    data() {
        return {
            det: [],
            csrf : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    methods: {
        onClick(i) {
            this.$data.det[i].edit = !this.$data.det[i].edit;
            if(this.$data.det[i].edit === false) {
                this.$refs.form.submit();
            }
        }
    },  
    mounted() {
        this.det = this.$props.details;
    },

    unmounted() {
        this.$prosp.details = this.$data.det;
    }
}
</script>

<style scoped>

</style>
