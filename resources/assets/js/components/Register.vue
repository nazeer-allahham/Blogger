<template>
    <div class="register">
          <h1>Register</h1>
          <form method="POST" action="register">

            <input type="hidden" name="_token" :value="csrf">

            <div class="row" style="margin-left: 4px;">
              <b-form-group id="firstname"
                      label="First Name:"
                      label-for="firstname_in"
                      class="col-5">
                <input id="firstname_in"
                              type="text"
                              v-model="user.firstname"
                              name="firstname"
                              required
                              placeholder="Enter First Name"/>

              </b-form-group>

              <b-form-group id="lastname"
                      label="Last Name:"
                      label-for="lastname_in"
                      class="col-5">
                <input id="lastname_in"
                              type="text"
                              v-model="user.lastname"
                              name="lastname"
                              required
                              placeholder="Enter Last Name"/>

              </b-form-group>
              <label class="description">Write your first & last name exaclty like in your ID card</label>
            </div>

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

              <b-form-group id="confirm_password"
                      label="Confirm Password:"
                      label-for="confirm_password_in"
                      class="col-12">
                <input id="confirm_password_in"
                              type="password"
                              name="password_confirmation"
                              v-model="user.password_confirmation"
                              required
                              placeholder="Confirm Password"/>

              </b-form-group>
              <label class="description">Make your password strong and try to use symbols, digits with letters.</label>
            </b-form-group>

            <b-form-group id="birthday"
                    label="Birthday:"
                    label-for="birthday_in"
                    class="col-12">
              <input id="birthday_in"
                            type="date"
                            name="birthday"
                            v-model="user.birthday"
                            required
                            placeholder="Birthday"/>
            </b-form-group>
            
            <b-form-group style="margin-left: 16px;">
              <b-form-radio-group id="gender" v-model="user.gender" name="gender">
                <b-form-radio value="male">Male</b-form-radio>
                <b-form-radio value="female">Female</b-form-radio>
              </b-form-radio-group>
            </b-form-group>

            <b-button type="submit" variant="info" style="margin:0px 12px 8px 12px;">Register</b-button>
          </form>
    </div>
</template>

<script>
export default {
    data() {
        return  {
            user : {
                firstname: '',
                lastname: '',
                email: '',
                password: '',
                password_confirmation: '',
                gender: '',
                birthday: ''
            },

            csrf : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    }
}
</script>

<style scoped>

</style>
