<template>
  <div>
    <v-card class="mx-auto mt-2 md-3" max-width="250" tile>
      <v-list shaped>
        <v-subheader>REPORTS</v-subheader>
        <v-list-item-group v-model="selectedItem" color="primary">
          <v-list-item
            v-for="(item, i) in items"
            :key="i"
            route
            :to="item.route"
          >
            <v-list-item-icon>
              <v-icon v-text="item.icon"></v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title v-text="item.text"></v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
      </v-list>
      <div class="mt-3" max-width="250">
        <memPlans></memPlans>
    </div>
    </v-card>

  </div>
</template>
<script>
import memPlans from "./membershipPlan.vue";
export default {
  data: () => ({
    selectedItem: 1,
    items: [
      { text: "My Profile", icon: "mdi-account", route: "/myprofile" },
      { text: "My Photo", icon: "mdi-image", route: "/myphoto" },
      {
        text: "Personal Information",
        icon: "mdi-information-variant",
        route: "/personalInfo",
      },
      {
        text: "Tution Related Information",
        icon: "mdi-information",
        route: "/tutionInfo",
      },
      {
        text: "Upgrade Tutor Membership",
        icon: "mdi-information",
        route: "/paynow",
      },
    ],
  }),

  components: {
    memPlans,
  },
};
</script>
