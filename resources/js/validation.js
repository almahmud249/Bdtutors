export default{
    data(){
        return{
            nameRules: [
                v => !!v || 'Name is required',
                v => v.length <= 10 || 'Name must be less than 10 characters',
              ],
        }
    },

   
}