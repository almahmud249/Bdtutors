<template>
  <v-app>
    <div>
      <v-container>
        <v-card class="mt-12">
          <div class="ma-10">
            <h2>Request a Tutor</h2>
          </div>
          <div class="ma-10" style="background: #316331; height: 5px"></div>
          <div class="ma-10">
            <h3>
              আপনার গৃহশিক্ষক দরকার হলে নিচের ফরমটা পুরন করুন । গৃহশিক্ষকেরা
              আপনার ফোনে যোগাযোগ করবে।
            </h3>
          </div>

          <v-row class="ma-10">
            <v-col cols="12" md="8">
              <v-container>
                <v-form>
                  <v-row>
                    <v-col cols="4">
                      <div>
                        <h4 class="1.25rem">Full Name :</h4>
                      </div>
                    </v-col>
                    <v-col cols="8">
                      <v-text-field
                        type="text"
                        v-model="form.name"
                        outlined
                        label="Enter Full Name"
                        :class="{ 'is-invalid': form.errors.has('name') }"
                        small
                        color
                        dense
                      ></v-text-field>
                      <h5 class="mb-3 mt-n5">
                        <has-error
                          style="color: red"
                          :form="form"
                          field="name"
                        ></has-error>
                      </h5>
                    </v-col>
                  </v-row>
                  <v-row class="mt-n5">
                    <v-col cols="4">
                      <div>
                        <h4 class="1.25rem">Select District :</h4>
                      </div>
                    </v-col>
                    <v-col cols="8">
                      <v-select
                        outlined
                        small
                        label="Enter District"
                        v-model="selectDivision"
                        :items="districts"
                        v-bind:on="SelectArea()"
                        dense
                      >
                      </v-select>
                    </v-col>
                  </v-row>
                  <v-row class="mt-n5">
                    <v-col cols="4">
                      <div>
                        <h4 class="1.25rem">Select Area:</h4>
                      </div>
                    </v-col>
                    <v-col cols="8">
                      <v-select
                        outlined
                        small
                        dense
                        :class="{ 'is-invalid': form.errors.has('area') }"
                        v-model="form.area"
                        label="Enter Area"
                        :items="areas"
                        item-text="label"
                      ></v-select>
                      <h5 class="mb-3 mt-n5">
                        <has-error
                          style="color: red"
                          :form="form"
                          field="area"
                        ></has-error>
                      </h5>
                    </v-col>
                  </v-row>
                  <v-row class="mt-n5">
                    <v-col cols="4">
                      <div>
                        <h4 class="1.25rem">Select Medium:</h4>
                      </div>
                    </v-col>
                    <v-col cols="8">
                      <v-select
                        outlined
                        small
                        v-model="form.medium"
                        :items="mediums"
                        label="Enter Medium"
                        :class="{ 'is-invalid': form.errors.has('medium') }"
                        dense
                      >
                      </v-select>
                      <h5 class="mb-3 mt-n5">
                        <has-error
                          style="color: red"
                          :form="form"
                          field="medium"
                        ></has-error>
                      </h5>
                    </v-col>
                  </v-row>
                  <v-row class="mt-n5">
                    <v-col cols="4">
                      <div>
                        <h4 class="1.25rem">Select Class:</h4>
                      </div>
                    </v-col>
                    <v-col cols="8">
                      <v-select
                        outlined
                        :class="{ 'is-invalid': form.errors.has('class') }"
                        small
                        label="Enter Class"
                        dense
                        v-model="form.class"
                        :items="classes"
                        item-text="label"
                      >
                      </v-select>
                      <h5 class="mb-3 mt-n5">
                        <has-error
                          style="color: red"
                          :form="form"
                          field="class"
                        ></has-error>
                      </h5>
                    </v-col>
                  </v-row>
                  <v-row class="mt-n5">
                    <v-col cols="4">
                      <div>
                        <h4 class="1.25rem">Select Subject:</h4>
                      </div>
                    </v-col>
                    <v-col cols="8">
                      <v-select
                        outlined
                        :class="{ 'is-invalid': form.errors.has('subject') }"
                        small
                        v-model="form.subject"
                        label="Enter Subject"
                        :items="allSubjects"
                        item-text="label"
                        dense
                      >
                      </v-select>
                      <h5 class="mb-3 mt-n5">
                        <has-error
                          style="color: red"
                          :form="form"
                          field="subject"
                        ></has-error>
                      </h5>
                    </v-col>
                  </v-row>
                  <v-row class="mt-n5">
                    <v-col cols="4">
                      <div>
                        <h4 class="1.25rem">Students School :</h4>
                      </div>
                    </v-col>
                    <v-col cols="8">
                      <v-text-field
                        type="text"
                        outlined
                        v-model="form.school"
                        label="Enter School/College Name"
                        append-icon=""
                        :class="{ 'is-invalid': form.errors.has('school') }"
                        small
                        color
                        dense
                      ></v-text-field>
                      <h5 class="mb-3 mt-n5">
                        <has-error
                          style="color: red"
                          :form="form"
                          field="school"
                        ></has-error>
                      </h5>
                    </v-col>
                  </v-row>
                  <v-row class="mt-n5">
                    <v-col cols="4">
                      <div>
                        <h4 class="1.25rem">Days per week:</h4>
                      </div>
                    </v-col>
                    <v-col cols="8">
                      <v-select
                        outlined
                        v-model="form.days"
                        label="Enter Days/Week"
                        :items="days"
                        small
                        :class="{ 'is-invalid': form.errors.has('days') }"
                        dense
                      >
                      </v-select>
                      <h5 class="mb-3 mt-n5">
                        <has-error
                          style="color: red"
                          :form="form"
                          field="days"
                        ></has-error>
                      </h5>
                    </v-col>
                  </v-row>
                  <v-row class="mt-n5">
                    <v-col cols="4">
                      <div>
                        <h4 class="1.25rem">Gender of Student:</h4>
                      </div>
                    </v-col>
                    <v-col cols="8">
                      <v-select
                        outlined
                        v-model="form.studentGenders"
                        label="Enter Gender"
                        :items="gender"
                        :class="{
                          'is-invalid': form.errors.has('studentGenders'),
                        }"
                        small
                        dense
                      >
                      </v-select>
                      <h5 class="mb-3 mt-n5">
                        <has-error
                          style="color: red"
                          :form="form"
                          field="studentGenders"
                        ></has-error>
                      </h5>
                    </v-col>
                  </v-row>
                  <v-row class="mt-n5">
                    <v-col cols="4">
                      <div>
                        <h4 class="1.25rem">Salary Range:</h4>
                      </div>
                    </v-col>
                    <v-col cols="8">
                      <v-select
                        v-model="form.salery"
                        outlined
                        :class="{ 'is-invalid': form.errors.has('salery') }"
                        small
                        label="Enter Salery Range"
                        :items="salery"
                        dense
                      >
                      </v-select>
                      <h5 class="mb-3 mt-n5">
                        <has-error
                          style="color: red"
                          :form="form"
                          field="salery"
                        ></has-error>
                      </h5>
                    </v-col>
                  </v-row>
                  <v-row class="mt-n5">
                    <v-col cols="4">
                      <div>
                        <h4 class="1.25rem">Desired Tutor Gender:</h4>
                      </div>
                    </v-col>
                    <v-col cols="8">
                      <v-select
                        outlined
                        :class="{
                          'is-invalid': form.errors.has('tutorGenders'),
                        }"
                        small
                        label="Enter Gender"
                        v-model="form.tutorGenders"
                        :items="gender"
                        dense
                      >
                      </v-select>
                      <h5 class="mb-3 mt-n5">
                        <has-error
                          style="color: red"
                          :form="form"
                          field="tutorGenders"
                        ></has-error>
                      </h5>
                    </v-col>
                  </v-row>
                  <v-row class="mt-n5">
                    <v-col cols="4">
                      <div>
                        <h4 class="1.25rem">Details Address :</h4>
                      </div>
                    </v-col>
                    <v-col cols="8">
                      <v-text-field
                        type="rext"
                        v-model="form.address"
                        outlined
                        label="Enter Address"
                        append-icon=""
                        :class="{ 'is-invalid': form.errors.has('address') }"
                        small
                        color
                        dense
                      ></v-text-field>
                      <h5 class="mb-3 mt-n5">
                        <has-error
                          style="color: red"
                          :form="form"
                          field="address"
                        ></has-error>
                      </h5>
                    </v-col>
                  </v-row>
                  <v-row class="mt-n5">
                    <v-col cols="4">
                      <div>
                        <h4 class="1.25rem">Email :</h4>
                      </div>
                    </v-col>
                    <v-col cols="8">
                      <v-text-field
                        outlined
                        type="email"
                        :class="{ 'is-invalid': form.errors.has('email') }"
                        v-model="form.email"
                        label="Enter email"
                        append-icon=""
                        small
                        color
                        dense
                      ></v-text-field>
                      <h5 class="mb-3 mt-n5">
                        <has-error
                          style="color: red"
                          :form="form"
                          field="email"
                        ></has-error>
                      </h5>
                    </v-col>
                  </v-row>
                  <v-row class="mt-n5">
                    <v-col cols="4">
                      <div>
                        <h4 class="1.25rem">Phone :</h4>
                      </div>
                    </v-col>
                    <v-col cols="8">
                      <v-text-field
                        v-model="form.phone"
                        outlined
                        label="Enter phone "
                        append-icon=""
                        :class="{ 'is-invalid': form.errors.has('phone') }"
                        small
                        color
                        dense
                      ></v-text-field>
                      <h5 class="mb-3 mt-n5">
                        <has-error
                          style="color: red"
                          :form="form"
                          field="phone"
                        ></has-error>
                      </h5>
                    </v-col>
                  </v-row>
                </v-form>
              </v-container>
              <div class="text-center">
                <v-btn
                  small
                  elevation=""
                  @click="submit()"
                  color="success"
                  label="submit"
                  >Submit</v-btn
                >
              </div>
            </v-col>
            <v-col>
              <v-card class="mt-3" elevation="6" max-width="">
                <v-container>
                  <div>
                    <h4 class="1.25rem, font-weight-bold">Help & Info:</h4>
                  </div>

                  <v-divider class="mt-4 mb-4"></v-divider>

                  <div>
                    <h4>Q. If i cant get the desired tutor ?</h4>
                  </div>
                  <h5>
                    Just fill up the request tutor form and send us. We will try
                    to find your desired tutor.
                  </h5>
                  <div class="mt-4 mb-4">
                    <h4>Q. what will happen after fill the forms ?</h4>
                  </div>
                  <h5>
                    After fill up the form the information will be sent to
                    bdtutorsfinalnew support team. They will review/ verify the
                    info and will publish on the available tuitions section.
                  </h5>
                </v-container>
              </v-card>
            </v-col>
          </v-row>

          </v-card
        ></v-container
      >
    </div>

      <template>
            <div class="text-center ma-2">
              <v-snackbar v-model="snackbar">
                {{ text }}

                <template v-slot:action="{ attrs }">
                  <v-btn
                    color="pink"
                    text
                    v-bind="attrs"
                    @click="snackbar = false"
                  >
                    Close
                  </v-btn>
                </template>
              </v-snackbar>
            </div>
          </template>
    </v-app
  >

</template>
        </v-card>
      </v-container>
    </div>
  </v-app>
</template>

<script>
import reJson from "./../../Json/RequestJson";
import AreaJsonData from "./../../Json/areaJsonData";
import subjectJsonData from "./../../Json/preferSubject";

export default {
  data() {
    return {
        snackbar:false,
        text:"",
      districts: AreaJsonData.division,

      area: AreaJsonData.area,
      selectDivision: "",
      areas: {},
      selectArea: {},
      classes: reJson.class,
      mediums: reJson.medium,
      days: reJson.days,
      gender: reJson.gender,
      salery: reJson.salarRange,

      allSubjects: subjectJsonData.PreferedSubject.subject,

      form: new Form({
        name: "",
        area: "",
        medium: "",
        class: "",
        subject: "",
        school: "",
        days: "",
        studentGenders: "",
        salery: "",
        tutorGenders: "",
        address: "",
        email: "",
        phone: "",
      }),
    };
  },
  methods: {
    SelectArea() {
      if (this.selectDivision == "Dhaka") {
        this.areas = this.area.dhaka;
      } else if (this.selectDivision == "Chattragram") {
        this.areas = this.area.chattragram;
      } else {
        this.areas = "";
      }
    },

    submit() {
      this.form.post("post_for_tutor").then((response) => {
         this.text="Your request was successfully added, We will publish your request"
         this.snackbar=true;
      });
    },
  },
};
</script>
