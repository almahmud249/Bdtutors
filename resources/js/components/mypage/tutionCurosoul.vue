<template>
  <v-card height="300">
    <v-carousel
      cycle
      height="300"
       hide-delimiters
      hide-delimiter-background
      show-arrows-on-hover
      dark
    >
      <v-carousel-item v-for="(tution, i) in allTution" :key="i">
        <v-sheet color="white" height="100%">
              <div class="black--text">
            <h4>
              <v-icon color="#1976D2">mdi-bag-personal </v-icon> Available tutions ({{
                allTution.length
              }})
            </h4>

            <h4 class="text-right mt-n4 mr-4">
                <router-link style="text-decoration: none !important" to="/tutions">
                    <a color="#1976D2">View all Tutions</a>
                </router-link>
            </h4>
          </div>
          <div class="" style="background: #1976D2; height: 5px"></div>

          <v-divider></v-divider>

          <v-row class="black--text fill-height" align="center">
            <!-- <div class="text-h2 black--text">{{ tution.name }}</div> -->
            <v-col>
              <v-row class="ma-5 mt-n3">
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
                 <div class="text-right mr-3 mt-n3 flat">
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
                  <v-btn color="#1976D2" small depressed class="mb-3 mt-2">
                      View Details
                    </v-btn>
                </div>
            </v-col>
          </v-row>
        </v-sheet>
      </v-carousel-item>
    </v-carousel>
  </v-card>
</template>
<script>
export default {
  data() {
    return {};
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
};
</script>
