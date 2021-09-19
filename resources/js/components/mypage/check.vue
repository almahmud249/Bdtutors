<template>
  <div>
    <v-app>
      <div class="ml-13 mt-5">
        <h3>TUTOR CONTROL PANEL</h3>
      </div>
      <div class="ml-13 mr-10" style="background: #316331; height: 5px"></div>
      <v-row>
        <div v-for="info in userData" :key="info.i">
          <v-col> </v-col>
        </div>
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
