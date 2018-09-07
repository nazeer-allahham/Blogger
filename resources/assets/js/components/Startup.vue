<template>
<div id="startup">
    <my-header mode="this.normal <= 2 ? 'guest':'logged'"></my-header>
    <div class="container">
        
    </div>
</div>
</template>

<script>
export default {
    props: {
        normal: Number,
        login: Boolean,
        register: Boolean
    },
    data() {
        return {
            loginForm: {},
            registerForm: {}
        }
    },
    created() {
        /* if(this.$props.normal)
        {
            this.$props.login  = true;
            this.$props.register = true;
        } */
    },
    mounted() {
        this.$props.login  = true;
        this.$props.register = true;

        if(this.$props.normal === 1)
        {
            this.$props.register = false;
        }
        else if(this.$props.normal === 2)
        {
            this.$props.login = false;
        }
    }
}
</script>

<style scoped>
.description {
    margin-left: 1em;
}
</style>
