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
                    .get('api/delete', {params: {id: user_id}})
                    .then(
                        response => {
                            this.getUsers();
                        }
                    )
                    .catch(
                    )
            }
        },
        addRandUser() {
            axios
                .get('api/add-rand-user')
                .then(
                    response => {
                        this.getUsers();
                    }
                )
                .catch(
                )
        }
    },
    beforeMount() {
        this.getUsers()
    }
})
