<template>
  <body>
    <div class="mainDiv mt-10" style="color:#BBDEFB">
      <svg
        viewBox="0 0 1366 200"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
      >
        <path
          fill="rgba(246, 248, 249, 1)"
          d="M 0 0 L 694 110 L 694 0 L 0 0 Z"
          stroke-width="0"
        ></path>
        <path
          fill="rgba(246, 248, 249, 1)"
          d="M 693 110 L 1366 0 L 1366 0 L 693 0 Z"
          stroke-width="0"
        ></path>
      </svg>
      <v-row cols="12">
        <v-col class="ml-14 mt-5 mb-10" style="color:#BBDEFB">
          <h1 class="text-center ">Follow Us</h1>
          <div class="text-center" mt-4>
            <v-btn class="mx-2" fab>
              <v-icon large>mdi-facebook</v-icon>
            </v-btn>
            <v-btn class="mx-2" fab>
              <v-icon large>mdi-google-plus</v-icon>
            </v-btn>
            <v-btn class="mx-2" fab>
              <v-icon large>mdi-linkedin</v-icon>
            </v-btn>
          </div>
          <h5 class="text-center mt-5">
            © 2015-2019, bdtutors.com : All rights reserved. Privacy Policy
            Terms of Service
          </h5>
        </v-col>
        <v-col class="ml-14 mt-5 mb-10" style="color:#BBDEFB">
          <h1 class="text-center" >Customer Service</h1>
          <div>
            <h3 class="text-center ">01829610249</h3>
          </div>
        </v-col>
        <v-col class="ml-14 mt-5 mb-10" style="color:#BBDEFB">
          <h1 class="text-center">We accept</h1>
          <div class="text-center" mt-4>
            <v-btn class="mx-2" fab>
              <img src="img/visa.jpg" height="70" width="70" />
            </v-btn>
            <v-btn class="mx-2" fab>
              <img src="img/nogod.png" height="70" width="70" />
            </v-btn>
            <v-btn class="mx-2" fab>
              <img src="img/bkash.png" height="70" width="70" />
            </v-btn>
          </div>

          <h5 class="text-center  mt-5">
            © 2015-2019, bdtutors.com : All rights reserved. Privacy Policy
            Terms of Service
          </h5>
        </v-col>
      </v-row>
    </div>
  </body>
</template>
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.mainDiv {
  background-color: #252934;
  display: felx;
  justify-content: center;
  align-items: center;
}
</style>
