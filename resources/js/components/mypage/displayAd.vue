<template>
<div>
    <h1 class="mt-6 text-center">01829610249</h1>
  <v-carousel
    cycle
    height="300"
    width="300"
    hide-delimiter-background
    show-arrows-on-hover

  >
    <v-carousel-item
      v-for="(slide, i) in colors"
      :key="i"
       :src="slide.src"
    >

    </v-carousel-item>
  </v-carousel>
</div>

</template>
<script>
  export default {
    data () {
      return {
        colors: [
          {src: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbQZqTOUeaM6Ps5ZKlgsyMRom5I4II4zxTd8AvwnNFXXSuIYigQtU469EtqTIYZx3-vYs&usqp=CAU'},
          {src: 'https://www.up.ac.za/crop/h480/w640/728/advertise.zp185775.jpg'},
          {src: 'https://marketeeringgroup.com/wp-content/uploads/2017/05/2-display-ad.png'},
        ],
        slides: [
          'First',
          'Second',
          'Third',
          'Fourth',
          'Fifth',
        ],
      }
    },
  }
</script>
