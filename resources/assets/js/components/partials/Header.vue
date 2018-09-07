<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            
            <b-navbar-toggle target="nav_collapse" class="mb-2"></b-navbar-toggle>

            <b-navbar-nav class="">
                <a class="navbar-brand mx-auto" href="/">Nazir4Tech</a>
            </b-navbar-nav>

            <b-collapse is-nav id="nav_collapse">
                
                <b-navbar-nav class="mx-auto">
                    <form class="form-inline" method="post" action="/">
                        <input type="text" name="key" id="search" placeholder="Search..." class="sm mx-2 px-2 rounded w-100"/>
                    </form>    
                </b-navbar-nav>

            </b-collapse>

            <b-navbar-nav class="">
                <b-btn v-if="this.mode == 'logged'" id="navigation-view-toggler" variant="dark">
                    <img src="../../../img/male-user.png" class="img img-responsive"/>
                </b-btn>
                <b-btn v-else variant="success" size="sm">
                    <span class="fa fa-sign-in-alt"></span> Signin
                </b-btn>
            </b-navbar-nav>
            
            <b-popover target="navigation-view-toggler" triggers="hover focus" placement="bottomright">
                <b-list-group>
                    <b-list-group-item variant="light" class="list-group-item">
                        <a href="/username" class="nav-link">
                            Username <i>(Profile)</i>
                        </a>
                    </b-list-group-item>
                    <b-list-group-item variant="light" class="list-group-item">
                        <a href="/username/settings" class="nav-link">
                            <span class="fa fa-cog" width="32px" height="32px"></span> Settings
                        </a>
                    </b-list-group-item>
                    <b-list-group-item variant="light" class="list-group-item">
                        <a href="/logout" class="nav-link">
                            <span class="fa fa-sign-out-alt" width="32px" height="32px"></span> Logout
                        </a>
                    </b-list-group-item>
                    <b-list-group-item variant="light" class="list-group-item">
                        
                    </b-list-group-item>
                </b-list-group>
            </b-popover>
            
        </nav>

        <div style="margin-top: 4em">
           <!-- <img src="../../../img/header.png" class="bg-warning w-100 img-responsive"/> -->
        </div>
    </div>
</template>

<script>
export default {
    props : {
        mode : String
    },

    data: () => ({
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    })
}
</script>

<style scoped>

.img {
    max-width: 2em;
    max-height: 2em;
}

.list-inline-item {
    padding: 0 5px;
    height: 32px;
}

.form-group {
    padding: 0px 12px;
    border-radius: 4px;
}

.list-group-item > .nav-link{
    text-decoration-style: none;
    color: #333;
}

</style>
