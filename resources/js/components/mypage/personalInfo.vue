<template>
  <div>
    <v-app>
      <div class="ml-13 mt-5">
        <h3>TUTOR CONTROL PANEL</h3>
      </div>
      <div class="ml-13 mr-10" style="background: #316331; height: 5px"></div>
      <v-row class="mt-5 ml-10" md="12">
        <v-col cols="12" sm="6" md="9">
          <v-card max-width="1000" class="mt-n3">
            <div class="ml-13">
              <h3>Personal Information</h3>
            </div>
            <div style="background: #316331; height: 5px; width: 350px"></div>
            <v-divider></v-divider>

            <p class="pa-5" style="background-color: #f2dede; color: #c96148">
              <img src="img/alert.png" height="25" width="25" />
              You are not a Premium or Featured Tutor. Upgrade your membership
              to get better response
            </p>
            <v-btn rounded class="ml-10 green">
              UPGRADE TUTOR MEMBERSHIP
            </v-btn>
            <v-divider class="mt-5"></v-divider>

            <v-card flat class="mx-auto text--primary" max-width="800">
              <v-card-text>
                <v-form ref="form">
                  <v-row>
                    <v-col md="3" class="mt-1">
                      <h3>Full Name:</h3>
                    </v-col>
                    <v-col>
                      <v-text-field
                        v-model="data.fullName"
                        color="success "
                        outlined
                        dense
                        placeholder="FullName"
                        prepend-icon="mdi-account"
                      ></v-text-field>
                    </v-col>
                  </v-row>

                  <v-row class="mt-n8">
                    <v-col md="3" class="mt-1">
                      <h3>Birth Date:</h3>
                    </v-col>
                    <v-col>
                      <v-menu
                        v-model="menu2"
                        :close-on-content-click="false"
                        :nudge-right="40"
                        transition="scale-transition"
                        offset-y
                        min-width="auto"
                      >
                        <template v-slot:activator="{ on, attrs }">
                          <v-text-field
                            v-model="date"
                            prepend-icon="mdi-calendar"
                            readonly
                            outlined
                            v-bind="attrs"
                            v-on="on"
                          ></v-text-field>
                        </template>
                        <v-date-picker
                          v-model="date"
                          @input="menu2 = false"
                        ></v-date-picker>
                      </v-menu>
                    </v-col>
                  </v-row>

                  <v-row class="mt-n8">
                    <v-col md="3" class="mt-1">
                      <h3>Blood Group:</h3>
                    </v-col>
                    <v-col>
                      <v-select
                        v-model="data.blood_group"
                        color="success "
                        :items="blood_group"
                        outlined
                        dense
                        placeholder="Blood Group"
                        prepend-icon="mdi-blood-bag"
                        required
                      ></v-select>
                    </v-col>
                  </v-row>

                  <v-row class="mt-n8">
                    <v-col md="3" class="mt-1">
                      <h3>Gender:</h3>
                    </v-col>
                    <v-col>
                      <v-select
                        v-model="data.gender"
                        color="success "
                        :items="gender"
                        outlined
                        dense
                        placeholder="gender"
                        prepend-icon="mdi-gender-male-female"
                        required
                      ></v-select>
                    </v-col>
                  </v-row>

                  <v-row class="mt-n8">
                    <v-col md="3" class="mt-1">
                      <h3>Marital Status:</h3>
                    </v-col>
                    <v-col>
                      <v-select
                        v-model="data.marital_status"
                        color="success "
                        :items="marital_status"
                        outlined
                        dense
                        placeholder="Marital Status"
                        prepend-icon="mdi-ab-testing"
                        required
                      ></v-select>
                    </v-col>
                  </v-row>

                  <v-row class="mt-n8">
                    <v-col md="3" class="mt-1">
                      <h3>Religion:</h3>
                    </v-col>
                    <v-col>
                      <v-select
                        v-model="data.religion"
                        color="success "
                        :items="religion"
                        outlined
                        dense
                        placeholder="Religion"
                        prepend-icon="mdi-bandcamp"
                        required
                      ></v-select>
                    </v-col>
                  </v-row>

                  <v-row class="mt-n8">
                    <v-col md="3" class="mt-1">
                      <h3>Present Address:</h3>
                    </v-col>
                    <v-col>
                      <v-text-field
                        v-model="data.address"
                        color="success "
                        outlined
                        dense
                        placeholder="Addres"
                        prepend-icon="mdi-map-marker"
                        required
                      ></v-text-field>
                    </v-col>
                  </v-row>

                  <!-- <v-row class="mt-n8">
                                    <v-col md="3" class="mt-1">
                                        <h3>Mobile:</h3>
                                    </v-col>
                                    <v-col>
                                        <v-text-field
                                            v-model="data.number"
                                            color="success "
                                            outlined
                                            dense
                                            placeholder="Number"
                                            prepend-icon="mdi-phone"
                                            required
                                        ></v-text-field>
                                    </v-col>
                                </v-row> -->

                  <!-- <v-row class="mt-n8">
                                    <v-col md="3" class="mt-1">
                                        <h3>Email:</h3>
                                    </v-col>
                                    <v-col>
                                        <v-text-field
                                            v-model="data.email"
                                            color="success "
                                            outlined
                                            dense
                                            placeholder="email"
                                            prepend-icon="mdi-email"
                                            required
                                        ></v-text-field>
                                    </v-col>
                                </v-row> -->

                  <v-row class="mt-n8">
                    <v-col md="3" class="mt-1">
                      <h3>Describe Yourself / Experience:</h3>
                    </v-col>
                    <v-col>
                      <v-textarea
                        v-model="data.desc"
                        color="success "
                        auto-grow
                        outlined
                        row-height="25"
                        prepend-icon="mdi-semantic-web"
                        shaped
                      ></v-textarea>
                    </v-col>
                  </v-row>
                </v-form>
                <div class="mb-5">
                  <v-btn block color="primary" @click="submit"
                    >Update Personal Information</v-btn
                  >
                </div>
              </v-card-text>
            </v-card>
          </v-card>
        </v-col>
        <v-col class="mt-n4 mr-10">
          <test></test>
        </v-col>
      </v-row>

      <div class="text-center">
        <v-snackbar
          v-model="snackbar"
          :timeout="timeout"
          color="deep-purple accent-4"
          top
          right
        >
          {{ text }}

          <template v-slot:action="{ attrs }">
            <v-btn color="white" text v-bind="attrs" @click="snackbar = false">
              Close
            </v-btn>
          </template>
        </v-snackbar>
      </div>
    </v-app>
  </div>
</template>

<script>
import test from "./test.vue";
export default {
  components: { test },
  data() {
    return {
      date: new Date().toISOString().substr(0, 10),
      menu: false,
      modal: false,
      menu2: false,

      data: {
        fullName: "",
        email: "",
        blood_group: "",
        number: "",
        religion: "",
        marital_status: "",
        address: "",
        gender: "",
        desc: "",
        date: "",
      },
      gender: ["Male", "Female"],
      blood_group: ["O+", "A+", "B-"],
      marital_status: ["Married", "Unmarried"],
      religion: ["Islam", "Hindu"],
      snackbar: false,
      text: "",
      timeout: 2000,

      allInfo: {},
      $result: {},
    };
  },
  methods: {
    submit() {
      axios
        .post("post_per_info", this.data)
        .then((response) => {
          this.text = "successfully data added";
          this.snackbar = true;
        })
        .catch((error) => {
          for (let i in error.response.data.errors) {
            this.text = error.response.data.errors[i][0];
            this.snackbar = true;
          }
        });
    },
  },
  created() {
    axios.get("get_all_info").then((res) => {
      this.data = res.data;
    });
  },
};
</script>
