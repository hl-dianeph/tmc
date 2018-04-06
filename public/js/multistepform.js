const app = new Vue({
    el: '#app',
    data() {
        return {
            step: 1,
            registration: {
                is_auth: false,
                name: null,
                email: null,
                street: null,
                city: null,
                state: null,
                numtickets: 0,
                shirtsize: 'XL'
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
                    alert('Please enter name');
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