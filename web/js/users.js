new Vue({
    el: '#app6',
    data: {
        users: [],
    },
    methods: {
        getUsers() {
            axios
                .get('api')
                .then(
                    response => {
                        //   console.log(response);
                        console.log(response.data)
                        this.users = response.data;
                    }
                )
                .catch(
                    // error=>console.log(error)
                )
        },
        deleteUser(user_id) {

            var confirm_var = confirm("Удалить пользователя?");

            if (confirm_var) {
                axios
                    .get('api/delete', {user_id: user_id})
                    .then(
                        response => {
                            //   console.log(response);
                            console.log(response.data)
                            this.users = response.data;
                        }
                    )
                    .catch(
                        // error=>console.log(error)
                    )
            }
        }
    },
    beforeMount() {
        this.getUsers()
    }
})
