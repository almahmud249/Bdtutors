import Vue from "vue";
import Router from "vue-router";
import testroute from "./components/testroute";
import home from "./components/home";
import singup from "./components/singup";
import test from "./components/mypage/test";
import myprofile from "./components/mypage/myprofile";
import myphoto from "./components/mypage/myphoto";
import payNow from "./components/mypage/payNow";
import check from "./components/mypage/check";
import personalInfo from "./components/mypage/personalInfo";
import Retutor from "./components/mypage/requestTutor";
import tutions from "./components/mypage/tutions";
import footer from "./components/mypage/footer";
import login from "./components/mypage/login";
import notfound from "./components/mypage/notfound";
import tutionInfo from "./components/mypage/tutionInfo";
import profile from "./components/mypage/profile";
import askForTution from "./components/mypage/askForTution";

Vue.use(Router);
const routes = [
    {
        path: "/new",
        component: testroute,
    },

    {
        path: "/",
        component: home,
    },
    {
        path: "/singup",
        component: singup,
    },
    {
        path: "/myprofile",
        component: myprofile,
    },
    {
        path: "/test",
        component: test,
    },
    {
        path: "/myphoto",
        component: myphoto,
    },
    {
        path: "/personalInfo",
        component: personalInfo,
    },
    {
        path: "/footer",
        component: footer,
    },
    {
        path: "/login",
        component: login,
    },
    {
        path: "/tutionInfo",
        component: tutionInfo,
    },
    {
        path: "/askForTution",
        component: askForTution,
    },
    {
        path: "/profile",
        component: profile,
        name:"profile"
    },
    {
        path: "/retutor",
        component: Retutor,
    },
    {
        path: "/tutions",
        component: tutions,
    },
    {
        path: "/paynow",
        component: payNow,
    },
    {
        path: "*",
        component: notfound,
    },






];
export default new Router({ routes, mode: "history" });
