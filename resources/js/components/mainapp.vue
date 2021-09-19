<template>
    <div >
        <v-app style="background-color: #F6F8F9">
            <v-card color="grey lighten-4" flat tile>
                <v-toolbar flat extension-height="150" color="#252934">
                    <v-img
                        class="ml-10"
                        src="img/logo.png"
                        max-height="100"
                        max-width="100"
                    ></v-img>

                    <v-btn class="ml-5" depressed small>
                        <router-link to="/" style="text-decoration: none">
                            <v-icon left>mdi-home</v-icon>
                            HOME
                        </router-link>
                    </v-btn>

                    <v-btn class="ml-5" depressed small>
                        <v-icon left>mdi-briefcase </v-icon>
                        JOBS
                    </v-btn>

                    <v-btn class="ml-5" depressed small>
                       <router-link to="/retutor" style="text-decoration: none">
                            <v-icon left>mdi-home</v-icon>
                            Request A Tutor
                        </router-link>
                    </v-btn>
                      <v-btn class="ml-5" depressed small>
                       <router-link to="/tutions" style="text-decoration: none">
                            <v-icon left>mdi-home</v-icon>
                            Tutions
                        </router-link>
                    </v-btn>

                    <v-spacer></v-spacer>

                    <div v-if="this.user">
                        <v-btn
                            v-show="isLogging"
                            class="ml-5 mr-5"
                            depressed
                            small
                        >
                            <router-link to="login" class="routerLink">
                                <v-icon left>mdi-arrow-up</v-icon>
                                Log In
                            </router-link>
                        </v-btn>
                        <v-btn class="ml-5" depressed small v-show="isLogging">
                            <router-link to="singup" class="routerLink">
                                <v-icon left>mdi-login</v-icon>
                                Sing Up
                            </router-link>
                        </v-btn>

                        <div class="text-center mr-10">
                            <v-menu offset-y open-on-hover>
                                <template v-slot:activator="{ on, attrs }">
                                    <v-btn
                                        color="primary"
                                        dark
                                        v-bind="attrs"
                                        v-on="on"
                                        small
                                        width="200"
                                    >
                                        {{ tutors.FullName }}
                                    </v-btn>
                                </template>
                                <v-list>
                                    <v-list-item
                                        v-for="(item, i) in items"
                                        :key="i.title"
                                        router
                                        :to="item.route"
                                    >
                                        <v-list-item-title style="color:red">
                                            <!-- <router-link
                                                to="/myprofile"
                                                style="text-decoration: none"
                                            >
                                                {{ item.profile }}
                                            </router-link> -->
                                            {{ item.title }}
                                        </v-list-item-title>
                                    </v-list-item>
                                    <v-btn plain>
                                        <a
                                            style="text-decoration: none;color:red"
                                            href="logout"
                                            >Logout</a
                                        >
                                    </v-btn>
                                </v-list>
                            </v-menu>
                        </div>
                    </div>
                    <div v-else>
                        <v-btn class="ml-5 mr-5" depressed small>
                            <router-link to="login" class="routerLink">
                                <v-icon left>mdi-arrow-up</v-icon>
                                Log In
                            </router-link>
                        </v-btn>

                        <v-btn class="mr-5" depressed small>
                            <router-link to="singup" class="routerLink">
                                <v-icon left>mdi-login</v-icon>
                                Sing Up
                            </router-link>
                        </v-btn>
                    </div>

                    <!-- dropdown -->
                </v-toolbar>
            </v-card>
            <router-view />
            <footerTag/>


        </v-app>
    </div>
</template>
<script>
import footerTag from './mypage/footer.vue'
export default {

    props: ["user"],
    data() {
        return {
            items: [
                { title: "My profile", route: "/myprofile" },
                { title: "Click Me" }
            ],

            isLogging: false,
            tutors: {}
        };
    },

    created() {
        this.tutors = this.user;
    },
    components:{
footerTag

    }
};
</script>
<style scoped>
.routerLink {
    text-decoration: none;
}
</style>
