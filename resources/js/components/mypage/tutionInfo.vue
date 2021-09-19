<template>
  <div>
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
            You are not a Premium or Featured Tutor. Upgrade your membership to
            get better response
          </p>
          <v-btn rounded class="ml-10 green"> UPGRADE TUTOR MEMBERSHIP </v-btn>
          <v-divider class="mt-5"></v-divider>

          <v-card flat class="text--primary" max-width="1000">
            <v-card-text>
              <v-form ref="form">
                <v-row>
                  <v-col md="4" class="mt-1">
                    <h3 style="color: black">
                      Your Highest Qualification/Degree Name:
                    </h3>
                  </v-col>
                  <v-col>
                    <v-text-field
                      v-model="data.qualification"
                      color="success "
                      outlined
                      dense
                      label="Your Highest Qualification"
                      prepend-icon="mdi-account"
                    ></v-text-field>
                  </v-col>
                </v-row>
                <v-row class="mt-n8">
                  <v-col md="4" class="mt-1">
                    <h3 style="color: black">Expected Minimum Salary:</h3>
                  </v-col>
                  <v-col>
                    <v-text-field
                      v-model="data.salary"
                      prepend-icon="mdi-calendar"
                      label="Salary"
                      outlined
                      dense
                    ></v-text-field>
                  </v-col>
                </v-row>

                <v-row class="mt-n8">
                  <v-col md="4" class="mt-1">
                    <h3 style="color: black">Current Status for Tuition:</h3>
                  </v-col>
                  <v-col>
                    <v-select
                      v-model="data.currentStatus"
                      :items="CurrentStatus"
                      prepend-icon="mdi-calendar"
                      label="Select Current Status"
                      outlined
                      dense
                    ></v-select>
                  </v-col>
                </v-row>
                <v-row class="mt-n8">
                  <v-col md="4" class="mt-1">
                    <h3 style="color: black">Days per week:</h3>
                  </v-col>
                  <v-col>
                    <v-text-field
                      v-model="data.dayPerW"
                      prepend-icon="mdi-calendar"
                      label="Days Per Week"
                      outlined
                      dense
                    ></v-text-field>
                  </v-col>
                </v-row>

                <v-row class="mt-n8 mb-5">
                  <v-col md="4" class="mt-1">
                    <h3 style="color: black">Preffered Tutoring Style:</h3>
                  </v-col>
                  <v-col>
                    <div v-for="style in tutoringStyle" :key="style.value">
                      <v-checkbox
                        :label="style.label"
                        v-model="data.tutorStyle"
                        :value="style.value"
                        multiple
                        class="mb-n5"
                        dense
                      ></v-checkbox>
                    </div>
                  </v-col>
                </v-row>

                <v-row class="mt-n8 mb-5">
                  <v-col md="4" class="mt-1">
                    <h3 style="color: black">Place of Learning:</h3>
                  </v-col>
                  <v-col>
                    <div v-for="place in learningPlace" :key="place.value">
                      <v-checkbox
                        :label="place.label"
                        v-model="data.LearningPlace"
                        :value="place.value"
                        class="mb-n5"
                        multiple
                        dense
                      ></v-checkbox>
                    </div>
                  </v-col>
                </v-row>

                <v-row class="mt-n8 mb-5">
                  <v-col md="4" class="mt-1">
                    <h3 style="color: black">Tutoring Approach:</h3>
                  </v-col>
                  <v-col>
                    <div
                      v-for="approach in TutoringApproach"
                      :key="approach.value"
                    >
                      <v-checkbox
                        :label="approach.label"
                        v-model="data.TutoringApproach"
                        :value="approach.value"
                        class="mb-n5"
                        multiple
                        dense
                      ></v-checkbox>
                    </div>
                    <div class="mb-5 mt-2">
                      <v-btn rounded color="primary" @click="submit"
                        >Update Information</v-btn
                      >
                    </div>
                  </v-col>
                </v-row>
                <v-divider></v-divider>
                <v-row class="mt-3">
                  <v-col md="4" class="mt-1">
                    <h3 style="color: black">
                      Preferred Medium Of Education and Classes:
                    </h3>
                  </v-col>
                  <v-col>
                    <template>
                      <v-expansion-panels>
                        <v-expansion-panel>
                          <v-expansion-panel-header>
                            Bangla Medium
                          </v-expansion-panel-header>
                          <v-expansion-panel-content>
                            <v-row no-gutters cols="12">
                              <v-col
                                cols="3"
                                v-for="bangla in BanglaMedium"
                                :key="bangla.value"
                              >
                                <div>
                                  <v-checkbox
                                    :label="bangla.label"
                                    v-model="MediumOfEducation.PreferBangla"
                                    :value="bangla.value"
                                    multiple
                                    dense
                                  ></v-checkbox>
                                </div>
                              </v-col>
                            </v-row>
                          </v-expansion-panel-content>
                        </v-expansion-panel>
                      </v-expansion-panels>
                    </template>
                    <v-divider></v-divider>
                    <template class="mt-5">
                      <v-expansion-panels>
                        <v-expansion-panel>
                          <v-expansion-panel-header>
                            English Medium
                          </v-expansion-panel-header>
                          <v-expansion-panel-content>
                            <v-row no-gutters cols="12">
                              <v-col
                                cols="3"
                                v-for="english in EnglishMedium"
                                :key="english.value"
                              >
                                <div>
                                  <v-checkbox
                                    :label="english.label"
                                    v-model="MediumOfEducation.PreferEnglish"
                                    :value="english.value"
                                    multiple
                                    dense
                                  ></v-checkbox>
                                </div>
                              </v-col>
                            </v-row>
                          </v-expansion-panel-content>
                        </v-expansion-panel>
                      </v-expansion-panels>
                    </template>

                    <v-divider></v-divider>
                    <template class="mt-5">
                      <v-expansion-panels>
                        <v-expansion-panel>
                          <v-expansion-panel-header>
                            Language Learning
                          </v-expansion-panel-header>
                          <v-expansion-panel-content>
                            <v-row>
                              <v-col
                                v-for="lanuage in AllLanuage"
                                :key="lanuage.value"
                              >
                                <div>
                                  <v-checkbox
                                    :label="lanuage.label"
                                    v-model="MediumOfEducation.PreferLanguage"
                                    :value="lanuage.value"
                                    multiple
                                    dense
                                  ></v-checkbox>
                                </div>
                              </v-col>
                            </v-row>
                          </v-expansion-panel-content>
                        </v-expansion-panel>
                      </v-expansion-panels>
                    </template>

                    <v-divider></v-divider>
                    <template class="mt-5">
                      <v-expansion-panels>
                        <v-expansion-panel>
                          <v-expansion-panel-header>
                            Computer Learning
                          </v-expansion-panel-header>
                          <v-expansion-panel-content>
                            <v-row no-gutters cols="12">
                              <v-col
                                cols="3"
                                v-for="computer in ComputerLearning"
                                :key="computer.value"
                              >
                                <div>
                                  <v-checkbox
                                    :label="computer.label"
                                    v-model="MediumOfEducation.ComputerLearn"
                                    :value="computer.value"
                                    multiple
                                    dense
                                  ></v-checkbox>
                                </div>
                              </v-col>
                            </v-row>
                          </v-expansion-panel-content>
                        </v-expansion-panel>
                      </v-expansion-panels>
                    </template>

                    <v-divider></v-divider>
                    <template class="mt-5">
                      <v-expansion-panels>
                        <v-expansion-panel>
                          <v-expansion-panel-header>
                            Extra Curricular Activities
                          </v-expansion-panel-header>
                          <v-expansion-panel-content>
                            <v-row>
                              <v-col
                                v-for="activities in ExtraActivities"
                                :key="activities.value"
                              >
                                <div>
                                  <v-checkbox
                                    :label="activities.label"
                                    v-model="MediumOfEducation.ExtraActivities"
                                    :value="activities.value"
                                    multiple
                                    dense
                                  ></v-checkbox>
                                </div>
                              </v-col>
                            </v-row>
                          </v-expansion-panel-content>
                        </v-expansion-panel>
                      </v-expansion-panels>
                    </template>
                    <div class="mb-5 mt-2">
                      <v-btn rounded color="primary" @click="classSubmit"
                        >Update Information</v-btn
                      >
                    </div>
                  </v-col>
                </v-row>
                <v-divider></v-divider>
                <v-row class="mt-3">
                  <v-col md="4" class="mt-1">
                    <h3 style="color: black">Preferred Subjects::</h3>
                  </v-col>
                  <v-col>
                    <template>
                      <v-card class="mx-auto" outlined>
                        <v-row no-gutters cols="12">
                          <v-col
                            cols="4"
                            v-for="subject in PreferSubject"
                            :key="subject.value"
                          >
                            <template>
                              <v-checkbox
                                :label="subject.label"
                                v-model="AllSubject"
                                :value="subject.value"
                                multiple
                                dense
                                class="mb-n3"
                              ></v-checkbox>
                            </template>
                          </v-col>
                        </v-row>
                      </v-card>
                    </template>
                    <div class="mb-5 mt-5">
                      <v-btn rounded color="primary" @click="UpdateSubject"
                        >Update Information</v-btn
                      >
                    </div>
                  </v-col>
                </v-row>
                <v-divider></v-divider>
                <v-row>
                  <v-col md="4" class="mt-3">
                    <h3 style="color: black">Preferred Place to Teach:</h3>
                  </v-col>
                  <v-col cols="8">
                    <v-row no-gutters cols="12">
                      <v-col >
                        <v-select
                          v-model="selectDivision"
                          label="Select"
                          :items="division"
                          v-bind:on="SelectArea()"
                        ></v-select>
                        <v-card>
                          <div v-for="ar in areas" :key="ar.value">
                            <v-checkbox
                              :label="ar.label"
                              multiple
                              dense
                              v-model="selectArea"
                              :value="ar.value"
                              class="mb-n3"
                            ></v-checkbox>
                          </div>
                        </v-card>
                        <div class="mb-5 mt-5">
                          <v-btn rounded color="primary" @click="updateArea"
                            >Update Information</v-btn
                          >
                        </div>
                      </v-col>
                    </v-row>
                  </v-col>
                </v-row>
              </v-form>
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
  </div>
</template>

<script>
import test from "./test.vue";
import JsonData from "./../../Json/jsonData";
import ClassJsonData from "./../../Json/classJsonData";
import SubjectJsonData from "./../../Json/preferSubject";
import AreaJsonData from "./../../Json/areaJsonData";
export default {
  components: {
    test,
  },
  data() {
    return {
      tutoringStyle: JsonData.options.TutoringStyle,
      learningPlace: JsonData.Learnplace.LearningPLace,
      TutoringApproach: JsonData.TutorinApproach.approach,

      BanglaMedium: ClassJsonData.PreferedClass.class,
      EnglishMedium: ClassJsonData.PreferedEnglishMedium.class,
      AllLanuage: ClassJsonData.PreferedLanguage.class,
      ComputerLearning: ClassJsonData.ComputerLearning.computer,
      ExtraActivities: ClassJsonData.ExtraActivities.class,

      MediumOfEducation: {
        PreferBangla: {},
        PreferEnglish: {},
        PreferLanguage: {},
        ComputerLearn: {},
        ExtraActivities: {},
      },

      PreferSubject: SubjectJsonData.PreferedSubject.subject,
      AllSubject: {},

      division: AreaJsonData.division,
      area: AreaJsonData.area,
      selectDivision: "",
      areas: {},
      selectArea:{},

      text: "",
      timeout: 2000,
      snackbar: false,


      CurrentStatus: ["Available", "Busy", "Deactive"],

      data: {
        tutorStyle: {},
        TutoringApproach: {},
        LearningPlace: {},
        qualification: "",
        currentStatus: "",
        dayPerW: "",
        salary: "",
      },

    };
  },

  methods: {
    async submit() {
      axios.post("post_info", this.data).then((res) => {
        this.text = "successfully data added";
        this.snackbar = true;
      });
    },

    async classSubmit() {
      axios.post("post_class", this.MediumOfEducation).then((res) => {
        this.text = "successfully data added";
        this.snackbar = true;
      });
    },

    async UpdateSubject() {
      axios.post("post_subject", this.AllSubject).then((res) => {
        this.text = "successfully data added";
        this.snackbar = true;
      });
    },

    async updateArea() {

      axios.post("post_area", this.selectArea).then((res) => {
        this.text = "successfully data added";
        this.snackbar = true;
      });
    },

    SelectArea() {

      if (this.selectDivision == "Dhaka") {

        this.areas = this.area.dhaka;
      } else if (this.selectDivision == "Chattragram") {

        this.areas = this.area.chattragram;
      } else {
        this.areas = "";
      }
    },
  },

  created() {
    axios.get("get_area").then((res) => {
      this.selectArea = res.data;
      if (res.data.Prefer_area) {
       this.selectArea = res.data.Prefer_area.split(",");
      }
    });

    axios.get("get_allInfo").then((res) => {
      this.data.qualification = res.data.qualification;
      this.data.currentStatus = res.data.currentStatus;
      this.data.dayPerW = res.data.dayPerW;
      this.data.salary = res.data.salary;
      if (
        res.data.place_area ||
        res.data.tutoring_approach ||
        res.data.learning_place
      ) {
        this.data.tutorStyle = res.data.place_area.split(",");
        this.data.TutoringApproach = res.data.tutoring_approach.split(",");
        this.data.LearningPlace = res.data.learning_place.split(",");
      }
    });

    axios.get("get_education").then((res) => {
      if (
        res.data.activities ||
        res.data.banglaClass ||
        res.data.computer ||
        res.data.englishClass ||
        res.data.language
      ) {
        this.MediumOfEducation.ExtraActivities = res.data.activities.split(",");
        this.MediumOfEducation.PreferBangla = res.data.banglaClass.split(",");
        this.MediumOfEducation.ComputerLearn = res.data.computer.split(",");
        this.MediumOfEducation.PreferEnglish = res.data.englishClass.split(",");
        this.MediumOfEducation.PreferLanguage = res.data.language.split(",");
      }
    });

    axios.get("get_subject").then((res) => {
      console.log(res.data);
      if (res.data.prefer_subject) {
        this.AllSubject = res.data.prefer_subject.split(",");
      }
    });
  },
};
</script>
