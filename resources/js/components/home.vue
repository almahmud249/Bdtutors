<template>
  <v-app>
    <div>
      <v-container>
        <v-row class="mt-6">
          <v-col cols="12" md="6">
            <v-card elevation="2" height="300">
              <div class="ml-12">
                <h2>
                  <v-img
                    style="float: left"
                    src="https://image.shutterstock.com/image-vector/magnifying-glass-icon-vector-search-260nw-1727624158.jpg"
                    max-height="40px"
                    max-width="40px"
                  >
                  </v-img>
                  Seacrh for tutors
                </h2>
              </div>
              <div class="mt-5 ml-12">
                <h5 class="ml-10">Find a great tutor in your area</h5>
              </div>
              <v-divider></v-divider>
              <v-row class="ma-3">
                <v-col class="d-flex" cols="12" sm="6">
                  <v-select label="Outlined style" dense outlined></v-select>
                </v-col>
                <v-col class="d-flex" cols="12" sm="6">
                  <v-select label="Outlined style" dense outlined></v-select>
                </v-col>
              </v-row>
              <v-row class="ma-3 mt-n10">
                <v-col class="d-flex" cols="12" sm="6">
                  <v-select label="Outlined style" dense outlined></v-select>
                </v-col>
                <v-col class="d-flex" cols="12" sm="6">
                  <v-select label="Outlined style" dense outlined></v-select>
                </v-col>
              </v-row>

              <v-row class="ma-3 mt-n10">
                <v-col class="d-flex" cols="12" sm="6">
                  <v-select label="Outlined style" dense outlined></v-select>
                </v-col>
                <v-col class="d-flex" cols="12" sm="6">
                  <v-btn class="blue lighten-4">Search Tutor</v-btn>
                </v-col>
              </v-row>
            </v-card>
          </v-col>
          <v-col>
            <itemCurosoul></itemCurosoul>
          </v-col>
        </v-row>

        <v-row>
          <v-col>
            <div>
              <h2><img src="img/feat.png" width="40" /> Featured Tutors</h2>
            </div>
          </v-col>
          <v-col>
            <div></div>
          </v-col>
        </v-row>
        <div style="background: #1976d2; height: 5px"></div>
        <v-row>
          <v-col v-for="tutor in allTutors" :key="tutor.id" cols="3">
            <v-card max-width="250" class="mt-5">
              <v-row>
                <v-col cols="5" v-if="tutor.personal_information.photo">
                  <div class="text-center">
                    <h2>
                      <img src="img/featured.jpg" width="30" height="30" />
                    </h2>
                  </div>
                  <v-img
                    class="ml-5"
                    :src="`/img/${tutor.personal_information.photo}`"
                    height="70px"
                    width="70px"
                  >
                  </v-img>
                </v-col>

                <v-col cols="5" v-else>
                  <div class="text-center">
                    <h2>
                      <img src="img/featured.jpg" width="30" height="30" />
                    </h2>
                  </div>
                  <img src="img/profile.png" height="70px" width="70px" />
                </v-col>
                <v-col cols="7" class="mt-5">
                  <h5>{{ tutor.FullName }}</h5>
                  <h6>{{ tutor.number }}</h6>
                  <h6>{{ tutor.district }}</h6>
                </v-col>
              </v-row>
            </v-card>
          </v-col>
        </v-row>
      </v-container>

      <!-- footer -->
    </div>
  </v-app>
</template>
<script>
import itemCurosoul from "./mypage/tutionCurosoul.vue";
export default {
  data() {
    return {
      allTutors: {},
    };
  },
  components: {
    itemCurosoul,
  },

  async created() {
    axios.get("get_users").then((res) => {
      this.allTutors = res.data;
    });
  },
};
</script>

<style scoped>
.cardd {
  margin-top: 250px;
}
</style>
