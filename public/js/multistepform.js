const app = new Vue({
    el: '#app',
    data() {
        return {
            step: 1,
            errors: {
                name: '',
                email: '',
                description: '',
                category_id: '',
                avatar: '',
                not_member: false
            },
            loader: false,
            loader_avatar: false,
            is_auth: true,
            channel_telegram: {
                id: 0,
                title: null,
                name: null,
                type: null,
                description: null,
                members_count: 0,
                avatar: null,
                avatar_exists: false,
            },
            channel_tmc: {
                avatar: null,
                avatar_local: null,
                category_id: '',
                description: null,
                // email: null
            }
        }
    },
    methods: {
        prev() {
            this.step--;
        },

        next() {
            // save this in order to use in anonymous function
            $this = this;

            // step 1 - check channel name
            if ($this.step == 1) {
                // TODO: make reset like method
                $this.errors.name = '';

                // show loader
                $this.loader = true;

                let input = {
                    name: $this.channel_telegram.name
                };

                // validation
                $.post('/ajax/post-addchannel-step1', input, function(response) {
                    if (response.status == 'error') {
                        // hide loader
                        $this.loader = false;

                        // show error
                        $this.errors.name = response.errors;
                        return;
                    }

                    // find whether chat exists
                    $.get('/ajax/get-channel', { name: $this.channel_telegram.name }, function(response) {
                        console.log(response);
                        
                        let data = response;

                        // hide loader
                        $this.loader = false;

                        // if OK -> next step
                        if (data.status != 'ok') {
                            $this.errors.name = 'Ошибка: канал не найден.';
                            return;
                        }

                        // save data
                        $this.channel_telegram.id = data.result.id;
                        $this.channel_telegram.title = data.result.title;
                        // $this.channel_telegram.name = data.result.username;
                        $this.channel_telegram.type = data.result.type;
                        $this.channel_telegram.description = data.result.description;
                        $this.channel_telegram.members_count = data.result.count;
                        $this.channel_telegram.avatar = data.result.avatar;
                        $this.channel_telegram.avatar_exists = data.result.avatar_exists;

                        // console.log("Go next step");
                        $this.step++;
                    });
                });
            } else if ($this.step == 2) {
                $this.channel_tmc.avatar = $this.channel_telegram.avatar;
                $this.channel_tmc.description = $this.channel_telegram.description;

                $this.step++;
            } else if ($this.step == 3) {
                // show loader
                $this.loader = true;

                // reset errors
                // $this.errors.email = '';
                $this.errors.description = '';
                $this.errors.category_id = '';

                // validate 
                let input = {
                    'category_id': $this.channel_tmc.category_id,
                    'description': $this.channel_tmc.description
                    // 'email': $this.channel_tmc.email
                };

                $.post('/ajax/post-addchannel-step3', input, function(response) {
                    // console.log(response);

                    $this.loader = false;

                    if (response.errors) {
                        // if (response.errors.email) {
                        //     $this.errors.email = response.errors.email[0];
                        // }

                        if (response.errors.category_id) {
                            $this.errors.category_id = response.errors.category_id[0];
                        }

                        if (response.errors.description) {
                            $this.errors.description = response.errors.description[0];
                        }

                        return;
                    }
                    
                    $this.step++;
                        
                });    
            } else if ($this.step == 4) {

                $this.loader = true;

                $.post('/ajax/post-checkchannel-subscription', {}, function(response) {
                    console.log(response);

                    $this.loader = false;

                    if (response.status == "left") {
                        $this.errors.not_member = true;
                        return;
                    }

                    let input = {
                        telegram_id: $this.channel_telegram.id,
                        title: $this.channel_telegram.title,
                        name: $this.channel_telegram.name,
                        avatar: $this.channel_tmc.avatar,
                        avatar_local: $this.channel_tmc.avatar_local,
                        description: $this.channel_tmc.description,
                        telegram_type: $this.channel_telegram.type,
                        members_count: $this.channel_telegram.members_count,
                        category_id: $this.channel_tmc.category_id
                    };

                    $this.loader = true;

                    // create channel
                    $.post('/ajax/post-createchannel', input, function(response) {
                        console.log(response);

                        // hide loader
                        $this.loader = false;

                        // channel is created
                        if (response.status != 'ok') {
                           return;
                        }

                        $this.step++;
                    });

                    console.log($this.step);
                });
            } else if ($this.step == 5) {
                location.href = '/';
            }
        },

        uploadAvatar() {
            $this = this;

            let avatar = $('#avatar')[0].files[0];
            $this.errors.avatar = '';

            if (!avatar) {
                console.log("Please pick an image");
                return;
            }

            if (window.FormData) {
                formdata = new FormData();
                formdata.append('avatar', avatar);
                formdata.append('id', $this.channel_telegram.id);

                // show loader
                $this.loader_avatar = true;

                $.ajax({
                    url: '/ajax/post-uploadavatar',
                    type: 'POST',
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response)

                        if (response.status == 'error') {
                            $this.errors.avatar = response.errors;
                            return;
                        }

                        if (response.status == 'ok') {
                            $this.channel_tmc.avatar = response.path;
                            $this.channel_tmc.avatar_local = response.local_path;
                        }

                        // hide loader
                        $this.loader_avatar = false;

                        // hide buttons
                        $('#avatar').hide();
                        $('#avatarUploadBtn').hide();
                    }
                });
            }
        }
    }
});