<template>
  <div>
    <v-app>
      <div class="ml-13 mt-5">
        <h3>TUTOR CONTROL PANEL</h3>
      </div>
      <div class="ml-13 mr-10" style="background: #316331; height: 5px"></div>
      <v-row class="mt-5 ml-10 " md="12" v-for="(info, i) in userData" :key="i">
        <v-col cols="12" sm="6" md="8">
          <v-card max-width="1000">
            <v-row>
              <v-col  md="4">
                <v-img
                  v-if="info.personal_information.photo == null"
                  class="ml-5 mt-7"
                  src="https://st.depositphotos.com/1779253/5140/v/600/depositphotos_51405259-stock-illustration-male-avatar-profile-picture-use.jpg"
                >
                </v-img>
                <v-img
                  v-else
                  class="ml-5 mt-7"
                  :src="`/img/${info.personal_information.photo}`"
                  height="150px"
                  width="150px"
                >
                </v-img>
              </v-col>

              <v-col>
                <div>
                  <v-card-text>
                    <h2 style="color: #006699"></h2>
                    <h3>ID:42142442</h3>
                    <strong>Experience:</strong>
                  </v-card-text>

                  <v-card-text>
                    <div>
                      <strong>
                        <v-icon color="green darken-2">mdi-briefcase</v-icon
                        >Qualification:
                        {{ info.tution_related_info.qualification }}
                      </strong>
                    </div>
                    <div>
                      <strong>
                        <v-icon color="green darken-2">mdi-briefcase</v-icon>
                        Area Covered: (<span
                          v-for="area in allData[0]"
                          :key="area.value"
                          style="color: #006699; font-weight: normal"
                          >{{ area }} </span
                        >)
                      </strong>
                    </div>
                    <div>
                      <strong>
                        <v-icon color="green darken-2">mdi-briefcase</v-icon
                        >Teaching:
                      </strong>
                    </div>
                    <div>
                      <strong>
                        <v-icon color="green darken-2">mdi-briefcase</v-icon
                        >Phone: {{ info.number }}
                      </strong>
                    </div>
                    <div>
                      <strong>
                        <v-icon color="green darken-2">mdi-briefcase</v-icon
                        >Email: {{ info.email }}
                      </strong>
                    </div>
                  </v-card-text>
                </div>
              </v-col>
            </v-row>
            <v-divider
              style="background-color: silver"
              class="mt-5 mb-10"
            ></v-divider>
            <v-row no-gutters class="ml-5">
              <v-col md="4" class="mt-1">
                <h4>Expected Minimum Salary:</h4>
              </v-col>
              <v-col md="8"> {{ info.tution_related_info.salary }} Tk </v-col>
            </v-row>
            <v-row no-gutters class="ml-5">
              <v-col md="4" class="mt-1">
                <h4>Current Status for Tuition:</h4>
              </v-col>
              <v-col md="8">
                {{ info.tution_related_info.currentStatus }}
              </v-col>
            </v-row>
            <v-row no-gutters class="ml-5">
              <v-col md="4" class="mt-1">
                <h4>Days per week:</h4>
              </v-col>
              <v-col md="8">
                {{ info.tution_related_info.dayPerW }}
              </v-col>
            </v-row>
            <v-row no-gutters class="ml-5">
              <v-col md="4" class="mt-1">
                <h4>Preffered Tutoring Style::</h4>
              </v-col>
              <v-col md="8" class="mt-10">
                <v-row>
                  <v-col v-for="data in allData[7]" :key="data.value">
                    <v-checkbox
                      class="ml-n5 mt-n10"
                      :label="data"
                      dense
                      input-value="true"
                      disabled
                    ></v-checkbox>
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
            <v-row no-gutters class="ml-5">
              <v-col md="4" class="mt-1">
                <h4>Extra Facilities:</h4>
              </v-col>
              <v-col md="8" class="mt-10">
                <v-row>
                  <v-col v-for="data in allData[6]" :key="data.value">
                    <v-checkbox
                      class="ml-n5 mt-n10"
                      :label="data"
                      dense
                      input-value="true"
                      disabled
                    ></v-checkbox>
                  </v-col>
                </v-row>
              </v-col>
            </v-row>

            <v-row class="ml-5">
              <v-col md="4" class="mt-1">
                <h4>Preferred Classes:</h4>
              </v-col>
              <v-col>
                <v-row class="mt-1">
                  <div small v-for="data in allData[1]" :key="data.value">
                    <v-checkbox
                      v-if="data"
                      :label="data"
                      input-value="true"
                      dense
                      disabled
                      class="mb-n4"
                    ></v-checkbox>
                  </div>
                </v-row>
              </v-col>
            </v-row>
            <div class="ml-13 mr-10">
              <h3>Education Qualification</h3>
              <div style="background: #316331; height: 5px"></div>
            </div>
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
