<template>
  <div>
    <div class="ml-13 mt-5">
      <h3>TUTOR CONTROL PANEL</h3>
    </div>
    <div class="ml-13 mr-10" style="background: #316331; height: 5px"></div>
    <v-row class="mt-5 ml-10" md="12">
      <v-col class="mt-n3" cols="12" sm="6" md="9">
        <v-card max-width="1000">
          <div class="ml-13">
            <h3>My Photo</h3>
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

          <div>
            <img
              src="img/profile.png"
              height="200"
              class="ml-10 mt-10"
              width="200"
              md="2"
            />

            <v-file-input
              prepend-icon="mdi-camera"
              show-size
              type="file"
              label="File input"
              accept="image/png,image/jpeg, image/bmp"
              :rules="rules"
              truncate-length="50"
              @change="sub"
            >
            </v-file-input>
          </div>
          <v-btn rounded class="ml-10 mb-10 green" @click="submit">
            Upload New Photo
          </v-btn>
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
import test from "./test";
export default {
  data() {
    return {


      rules: [
        (value) =>
          !value ||
          value.size < 10000000 ||
          "Avatar size should be less than 2 MB!",
      ],
      image: "",
      timeout: 2000,
      snackbar: false,
      text:""
    };
  },
  methods: {
    submit() {
      const formData = new FormData();
      formData.set("image", this.image);
      axios.post("upload_image", formData).then((res) => {
        this.text = "suucessfully image uploaded";
        this.snackbar = true;
        window.location = "/myprofile";
      });
    },
    sub(e) {
      this.image = e;
    },
  },
  components: {
    test: test,
  },
};
</script>
