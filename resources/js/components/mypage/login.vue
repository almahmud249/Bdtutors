<template>
    <v-app>
        <v-row justify="center" class="mt-8">
            <v-col cols="12" sm="8" md="8" lg="6">
                <v-card class="elevation-12">
                    <v-window>
                        <v-window-item :value="1">
                            <v-row>
                                <v-col cols="12" md="8">
                                    <v-card-text class="mt-12">
                                        <h1
                                            class="text-center display-2"
                                            style="color: #3091e7"
                                        >
                                            Log in
                                        </h1>

                                        <h4 class="text-center" mlt="4">
                                            Ensure your email and password
                                        </h4>
                                        <v-form ref="form">
                                            <v-text-field 
                                                v-model="data.email"
                                                label="email"
                                                :rules="emailRules"
                                                placeholder="email"
                                                
                                                prepend-icon="mdi-email"
                                                required
                                            ></v-text-field>

                                            <v-text-field
                                                v-model="data.password"
                                                label="password"
                                                :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                                                @click:append="show = !show"
                                                :type="show ? 'text' : 'password'"
                                                :rules="passwordRules"
                                                placeholder="password"
                                                prepend-icon="mdi-lock"
                                                required
                                            ></v-text-field>
                                        </v-form>
                                        <h3 class="text-center mt-3">
                                            Forgot Your Password ?
                                        </h3>
                                    </v-card-text>
                                    <div class="text-center mb-5">
                                        <v-btn
                                            rounded
                                            dark
                                            class="blue darken-1"
                                            @click="submit"
                                            >SING IN</v-btn
                                        >
                                        <v-btn @click="clear"> clear </v-btn>
                                    </div>
                                </v-col>
                                <v-col cols="12" md="4" class="blue lighten-4">
                                    <v-card-text class="white-text mt-16">
                                        <div>
                                            <h1 class="text-center display-1">
                                                Hello, Friends
                                            </h1>
                                            <h5 class="text-center">
                                                Enter your personal details and
                                                start journey with us
                                            </h5>
                                        </div>
                                    </v-card-text>
                                </v-col>
                            </v-row>
                        </v-window-item>
                    </v-window>
                </v-card>
            </v-col>
        </v-row>

        <div class="text-center">
            <v-snackbar v-model="snackbar" :timeout="timeout" color="deep-purple accent-4" top right>
                {{ text }}

                <template v-slot:action="{ attrs }">
                    <v-btn
                        color="white"
                        text
                        v-bind="attrs"
                        
                        @click="snackbar = false"
                    >
                        Close
                    </v-btn>
                </template>
            </v-snackbar>
        </div>
    </v-app>
</template>

<script>
export default {
    data() {
        return {
            emailRules: [v => v.length > 3 || "email ids required"],

            passwordRules: [v => v.length > 3 || "password ids required"],

            email: "",
            password: "",
            data: {
                email: "",
                password: ""
            },

            text: "",
            timeout:2000,
            snackbar: false,
            show:false,
        };
    },
    methods: {
        submit() {
            if (this.$refs.form.validate()) {
                axios
                    .post("post_login_data", this.data)
                    .then(res => {
                        window.location="/",
                       this.text=res.data.msg
                        this.snackbar = true;
                    })
                    .catch(error => {
                        for (let i in error.response.data.errors) {
                            this.text = error.response.data.errors[i][0];
                            this.snackbar = true;
                        }
                    });
            }
        },

        clear() {
            this.data.email = "";
            this.data.password = "";
            this.$refs.observer.reset();
        }
    }
};
</script>
