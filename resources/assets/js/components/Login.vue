<template>
    <div class="login">
          <h1>Login</h1>
          <form method="POST" action="login">

            <input type="hidden" name="_token" :value="csrf">

            <b-form-group id="email"
                    label="Email:"
                    label-for="email_in"
                    class="col-12">
              <input id="email_in"
                            type="email"
                            name="email"
                            v-model="user.email"
                            required
                            placeholder="Enter Email Address"/>
            </b-form-group>

            <b-form-group>
              <b-form-group id="password"
                      label="Password:"
                      label-for="password_in"
                      class="col-12">
                <input id="password_in"
                              type="password"
                              name="password"
                              v-model="user.password"
                              required
                              placeholder="Enter Password"/>

              </b-form-group>
            </b-form-group>

            <b-button type="submit" variant="info" style="margin:0px 12px 8px 12px;">Login</b-button>
          </form>
    </div>
</template>

<script>
export default {
    data() {
        return  {
            user : {
                email: '',
                password: ''
            },

            csrf : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    }
}
</script>

<style scoped>

</style>
