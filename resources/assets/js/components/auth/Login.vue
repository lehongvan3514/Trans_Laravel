<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <div class="form-horizontal">

                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input
                                            v-model="email"
                                            id="email"
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            placeholder="Email"
                                            required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label

                                        class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input
                                            v-model="password"
                                            id="password"
                                            type="password"
                                            class="form-control"
                                            name="password"
                                            placeholder="Password"
                                            required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button @click="login" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="/password/reset">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <pre>
            {{ $data }}
        </pre>
    </div>
</template>

<style>

</style>

<script>

    export default{
        data() {
            return {
                email: '',
                password: '',
            }
        },

        methods: {
            login() {
                var data = {
                    client_id: 2,
                    client_secret: 'Y9tKKJDgOqwERY4UsxifjvNp269gCmj6Gf5tsJyQ',
                    grant_type: 'password',
                    username: this.email,
                    password: this.password,
                };

                this.$http.post("/oauth/token", data)
                    .then(response=>{
                        console.log(response);
                    });
                // .then(function(response) {
                //     console.log(response);
                // });
            }
        }
    }
</script>
