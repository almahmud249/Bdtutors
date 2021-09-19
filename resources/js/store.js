import axios from "axios";

export default {
    state: {
        allData: [],
        allTution: [],
        authUser: [],
        userData:[]
    },
    getters: {
        getAllData(state) {
            return state.allData;
        },
        getUserData(state) {
            return state.userData;
        },
        GetallTution(state) {
            return state.allTution;
        },
        GetAuthUser(state) {
            return state.authUser;
        }
    },
    actions: {
        setActiveItem(context) {
            axios.get("get_all_data").then(response => {
                let data = [

                ];
                var Prefer_area = {};
                var activities = [];
                var banglaClass = [];
                var computer=[];
                var englishClass=[];
                var language=[];
                var learning_place={};
                var place_area={};
                var tutoring_approach={};
                var tution_related_info={};
                var prefer_subject={};
                 console.table(response.data[0]);
                 if(response.data){


               if(response.data[0].area.Prefer_area) data.push(Prefer_area = response.data[0].area.Prefer_area.split(","));
               if(response.data[0].education_classes.activities) var activities = response.data[0].education_classes.activities.split( "," );
               if(response.data[0].education_classes.banglaClass) var banglaClass = response.data[0].education_classes.banglaClass.split( "," );
               if(response.data[0].education_classes.computer) var computer = response.data[0].education_classes.computer.split( "," );
               if(response.data[0].education_classes.englishClass) var englishClass = response.data[0].education_classes.englishClass.split( "," );
               if(response.data[0].education_classes.language) var language = response.data[0].education_classes.language.split( "," );

                data.push(activities.concat(banglaClass,computer,englishClass,language));

                if(response.data[0].tution_related_info.learning_place) data.push(learning_place = response.data[0].tution_related_info.learning_place.split( "," ));
                if(response.data[0].tution_related_info.place_area) data.push(place_area = response.data[0].tution_related_info.place_area.split( "," ));
                if(response.data[0].tution_related_info.tutoring_approach) data.push(tutoring_approach = response.data[0].tution_related_info.tutoring_approach.split( "," ));
                if(response.data[0].tution_related_info.tution_related_info) data.push(tution_related_info = response.data[0].tution_related_info);
                if(response.data[0].subject.prefer_subject) data.push(prefer_subject = response.data[0].subject.prefer_subject.split( "," ));
                 }
                context.commit("allData", data);
                context.commit("userData", response.data);

            });
        },
        TutionData(context) {
            axios.get("get_tution_data").then(response => {
                context.commit("allTution", response.data);
            });
        },
        AuthUser(context) {
            axios.get("auth_user").then(response => {
                context.commit("authUser", response.data);
            });
        }
    },
    mutations: {
        allData(state, payload) {
            return (state.allData = payload);
        },
        userData(state, payload) {
            return (state.userData = payload);
        },
        allTution(state, payload) {
            console.log(payload);
            return (state.allTution = payload);
        },
        authUser(state, payload) {
            return (state.authUser = payload);
        }
    }
};
