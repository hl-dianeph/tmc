const app = new Vue({
    el: '#app',
    data() {
        return {
            step: 1,
            registration: {
                is_auth: true,
                channel_telegram: {
                    name: null,
                    members_count: 0,
                    avatar: null,
                },
                channel_tmc: {
                    avatar: null,
                    description: null,
                    email: null
                }
            }
        }
    },
    methods: {
        prev() {
            this.step--;
        },
        next() {
            // validate for step 1
            if (this.step == 1) {
                if (this.registration.name == null || this.registration.name == "") {
                    alert('Введите название канала');
                    return;
                }
            }

            this.step++;
        },
        submit() {
            alert('Submit to blah and show blah and etc.');
        }
    }
});