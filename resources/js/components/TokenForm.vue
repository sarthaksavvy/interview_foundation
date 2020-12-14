<template>
    <div class="card">
        <div class="card-header">Github Token</div>

        <div class="card-body">
            <b-container v-if="userData.token">
                <b-row align-h="between">
                    <p>Your current token</p>
                    <b-icon-trash-fill
                        style="cursor:pointer"
                        @click="removeToken"
                        >Remove Token</b-icon-trash-fill
                    >
                </b-row>
                <p class="alert alert-success mt-1">{{ userData.token }}</p>
            </b-container>
            <b-form v-else @submit.prevent="handleForm">
                <b-container>
                    <b-row>
                        No Token ?
                        <a class="mx-1" target="_blank" :href="docLink">
                            Click here</a
                        >
                        to learn how to make token
                    </b-row>

                    <b-row class="mt-3">
                        <b-col>
                            <b-form-input
                                id="inline-form-input-name"
                                placeholder="Add Github Token"
                                v-model="form.token"
                            ></b-form-input>
                        </b-col>
                        <b-button type="submit" variant="primary"
                            >Save</b-button
                        >
                    </b-row>
                </b-container>
            </b-form>
        </div>
    </div>
</template>

<script>
export default {
    props: ["user"],
    data() {
        return {
            docLink:
                "https://docs.github.com/en/free-pro-team@latest/github/authenticating-to-github/creating-a-personal-access-token",
            form: {
                token: null
            },
            userData: {}
        };
    },
    created() {
        this.userData = this.user;
    },
    methods: {
        handleForm() {
            axios
                .post(`/token`, this.form)
                .then(res => {
                    this.userData.token = this.form.token;
                })
                .catch(() => {});
        },
        removeToken() {
            axios.delete("/token").then(() => (this.userData.token = null));
        }
    }
};
</script>
