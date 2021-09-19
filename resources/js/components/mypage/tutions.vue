<template>
  <v-app>
    <div style="background-color: #002f3c">
      <v-card height="100%" flat>
        <v-container>
          <div class="ma-10">
            <h2>Tutions</h2>
          </div>
          <div  style="background: #1976D2; height: 5px;"></div>
          <v-row>
            <v-col cols="8">
              <div>
                <h4>
                  <v-icon color="#1976D2">mdi-bag-personal </v-icon> Available tutions ({{
                    allTution.length
                  }})
                </h4>
              </div>
              <v-card v-for="tution in allTution" :key="tution.id" class="mt-3">
                <v-card
                  elevation="10"
                  style="background: #316331; height: 40px"
                >
                </v-card>
                <!-- <div elevation="10" style="background: #316331; height: 40px"></div> -->

                <v-row class="ma-5 mt-n1">
                  <v-col cols="3">
                    <h6>Tution ID#</h6>
                  </v-col>
                  <v-col cols="9">
                    <h5>294879561</h5>
                  </v-col>
                </v-row>
                <v-row class="ma-5 mt-n8">
                  <v-col cols="3">
                    <h6>Class/ Subject:</h6>
                  </v-col>
                  <v-col cols="9">
                    <h5>{{ tution.subject }}</h5>
                  </v-col>
                </v-row>
                <v-row class="ma-5 mt-n8">
                  <v-col cols="3">
                    <h6>Location:</h6>
                  </v-col>
                  <v-col cols="9">
                    <h5>{{ tution.address }}</h5>
                  </v-col>
                </v-row>
                <v-row class="ma-5 mt-n8">
                  <v-col cols="3">
                    <h6>Days:</h6>
                  </v-col>
                  <v-col cols="9">
                    <h5>
                      {{ tution.days }}
                    </h5>
                  </v-col>
                </v-row>
                <v-row class="ma-5 mt-n8">
                  <v-col cols="3">
                    <h6>Salary Range:</h6>
                  </v-col>
                  <v-col cols="9">
                    <h5>{{ tution.salery }}</h5>
                  </v-col>
                </v-row>
                <div v-if="AuthUser">
                  <v-row class="ma-5 mt-n8" v-if="AuthUser">
                    <v-col cols="3">
                      <h6>Phone/email:</h6>
                    </v-col>
                    <v-col cols="9">
                      <h5>{{ tution.phone }}/ {{ tution.email }}</h5>
                    </v-col>
                  </v-row>
                </div>

                <div class="text-right mr-3 flat">
                  <h5>Posted on: {{ tution.created_at | timeformat }}</h5>
                  <router-link
                    style="text-decoration: none !important"
                    to="login"
                    class="mr-10"
                  >
                    <h5 style="color: black" v-if="AuthUser === ''">
                      <span style="font-size: 15px; color: #81c784">Login</span>
                      to view contact information
                    </h5>

                  </router-link>
                  <v-btn color="#81C784" small depressed class="mb-3 mt-2">
                      View Details
                    </v-btn>
                </div>
                <!-- <div elevation="6" style="background: #316331; height: 40px"></div> -->
                <v-card
                  elevation="10"
                  style="background: #316331; height: 40px"
                >
                </v-card>
              </v-card>
            </v-col>
            <v-col cols="4"> <AdDisplay/> </v-col>
          </v-row>
        </v-container>
      </v-card>
    </div>
  </v-app>
</template>

<script>
import AdDisplay from "./displayAd.vue";
export default {
  props: ["user"],
  data() {
    return {
      tutors: {},
    };
  },
  components: {
    AdDisplay,
  },
  mounted() {
    this.$store.dispatch("TutionData");
    this.$store.dispatch("AuthUser");
  },
  computed: {
    allTution() {
      return this.$store.getters.GetallTution;
    },
    AuthUser() {
      return this.$store.getters.GetAuthUser;
    },
  },
  created() {
    this.tutors = this.user;
  },
};
</script>

