<template>
  <div>
    <div class="ml-13 mt-5">
      <h4>Membership Plans</h4>
    </div>
    <div class="ml-13 mr-10 mb-7" style="background: #316331; height: 5px"></div>
    <v-carousel
      cycle
      height="200"
      hide-delimiter-background
      show-arrows-on-hover
    >
      <v-carousel-item v-for="(slide, i) in slides" :key="i">
        <v-sheet :color="colors[i]" height="100%">
          <v-row class="fill-height" align="center" justify="center">
            <div class="text-h6">{{ slide }}</div>
          </v-row>
        </v-sheet>
      </v-carousel-item>
    </v-carousel>
    <div class="text-center">
        <v-btn color="#2B81D6"  >Pay Now</v-btn>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      colors: [
        "indigo",
        "warning",
        "pink darken-2",
        "red lighten-1",
        "deep-purple accent-4",
      ],

      slides: ["Featured Tutor", "Premimum Tutor", "Premimum for 7 days"],
    };
  },
};
</script>
