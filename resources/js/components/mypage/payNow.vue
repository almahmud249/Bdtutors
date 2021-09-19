<template>
  <div>
    <v-app>
      <div class="ml-13 mt-5">
        <h3>TUTOR CONTROL PANEL</h3>
      </div>

      <div class="ml-13 mr-10" style="background: #316331; height: 5px"></div>
      <v-row class="mt-5 ml-10" md="12" v-for="(info, i) in userData" :key="i">
        <v-col cols="12" sm="6" md="9">
          <v-card max-width="1000" flat>
            <v-row>
              <v-col md="4">
                <v-img
                  v-if="info.personal_information.photo == null"
                  class="ml-5 mt-7"
                  src="https://st.depositphotos.com/1779253/5140/v/600/depositphotos_51405259-stock-illustration-male-avatar-profile-picture-use.jpg"
                >
                </v-img>
                <v-img
                  v-else
                  class="ml-5"
                  :src="`/img/${info.personal_information.photo}`"
                  height="70px"
                  width="70px"
                >
                </v-img>
              </v-col>
              <v-col>
                <div class="ml-13 mt-5">
                  <h3>Upgrade Tutor Membership</h3>
                </div>
              </v-col>
            </v-row>
            <v-divider class="mb-5"></v-divider>
            <v-row>
              <v-col>
                <v-card>
                  <v-col>
                    <v-card color="#385F73" dark flat>
                      <v-card-title class="text-h6">
                        FEATURED TUTOR
                      </v-card-title>
                      <v-card-title class="text-h6">
                        Tk. 500 /365 Days
                      </v-card-title>
                    </v-card>
                  </v-col>
                  <v-col>
                    <v-card flat>
                      <div class="mb-3">
                        <h4>
                          <strong>Membership Fee : </strong>500 tk/ 1 Year.
                        </h4>
                      </div>
                      <div style="font-size: 15px">
                        <ul>
                          <li>
                            Featured tutors are highlighted on the home page.
                          </li>
                          <li>
                            Featured tutors get highest priority and listed on
                            top of the search.
                          </li>
                          <li>It increases the chance to get tuition.</li>
                          <li>SMS notification of new tuitions.</li>
                          <li>Email notification of new tuitions.</li>
                          <li>
                            Can see guardian mobile number so he can talk with
                            the guardian or student directly.
                          </li>
                        </ul>
                      </div>

                      <v-card-actions>
                        <v-btn text color="#1E88E5"> Pay Now </v-btn>
                      </v-card-actions>
                    </v-card>
                  </v-col>
                </v-card>
              </v-col>
              <v-col>
                <v-card>
                  <v-col>
                    <v-card color="#952175" dark flat>
                      <v-card-title class="text-h6">
                        PREMIUM TUTOR
                      </v-card-title>
                      <v-card-title class="text-h6">
                        Tk. 300 /180 Days
                      </v-card-title>
                    </v-card>
                  </v-col>
                  <v-col>
                    <v-card flat>
                      <div class="mb-3">
                        <h4>
                          <strong>Membership Fee : </strong>500 tk/ 1 Year.
                        </h4>
                      </div>
                      <div style="font-size: 15px">
                        <ul>
                          <li>
                            Featured tutors are highlighted on the home page.
                          </li>
                          <li>
                            Featured tutors get highest priority and listed on
                            top of the search.
                          </li>
                          <li>It increases the chance to get tuition.</li>
                          <li>SMS notification of new tuitions.</li>
                          <li>Email notification of new tuitions.</li>
                          <li>
                            Can see guardian mobile number so he can talk with
                            the guardian or student directly.
                          </li>
                        </ul>
                      </div>

                      <v-card-actions>
                        <v-btn text color="#1E88E5"> Pay Now </v-btn>
                      </v-card-actions>
                    </v-card>
                  </v-col>
                </v-card>
              </v-col>
              <v-col>
                <v-card>
                  <v-col>
                    <v-card color="#1F7087" dark flat>
                      <v-card-title class="text-h6">
                        PREMIUM FOR 7 DAYS
                      </v-card-title>
                      <v-card-title class="text-h6">
                        Tk. 100 /14 Days
                      </v-card-title>
                    </v-card>
                  </v-col>
                  <v-col>
                    <v-card flat>
                      <div class="mb-3">
                        <h4>
                          <strong>Membership Fee : </strong>500 tk/ 1 Year.
                        </h4>
                      </div>
                      <div style="font-size: 15px">
                        <ul>
                          <li>
                            Featured tutors are highlighted on the home page.
                          </li>
                          <li>
                            Featured tutors get highest priority and listed on
                            top of the search.
                          </li>
                          <li>It increases the chance to get tuition.</li>
                          <li>SMS notification of new tuitions.</li>
                          <li>Email notification of new tuitions.</li>
                          <li>
                            Can see guardian mobile number so he can talk with
                            the guardian or student directly.
                          </li>
                        </ul>
                      </div>

                      <v-card-actions>
                        <v-btn text color="#1E88E5"> Pay Now </v-btn>
                      </v-card-actions>
                    </v-card>
                  </v-col>
                </v-card>
              </v-col>
            </v-row>
          </v-card>
        </v-col>

        <v-col class="mt-n4 mr-10">
          <test></test>
        </v-col>
      </v-row>
    </v-app>
  </div>
</template>

<script>
import test from "./test.vue";
export default {
  data() {
    return {
      prefer_area: [],
    };
  },
  components: {
    test,
  },
  mounted() {
    this.$store.dispatch("setActiveItem");
  },

  computed: {
    allData() {
      return this.$store.getters.getAllData;
    },
    userData() {
      return this.$store.getters.getUserData;
    },
  },
  created() {
    // this.convertToArrayOfObjects();
    this.prefer_area = this.allData[0];
    // this.prefer_area= Object.assign({}, ...this.allData[0])
  },

  methods: {
    convertToArrayOfObjects(allData) {
      var keys = allData.shift(),
        i = 0,
        k = 0,
        obj = null,
        output = [];
      console.log(keys);

      //   for (i = 0; i < data.length; i++) {
      //     obj = {};

      //     for (k = 0; k < keys.length; k++) {
      //       obj[keys[k]] = data[i][k];
      //     }

      //     output.push(obj);
      //   }

      return output;
    },
  },
};
</script>

