<template>
    <div class="card">
        <div class="card-header">Github Token</div>

        <div class="card-body">
            <div v-if="user.token">
                Show token here
            </div>
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
            baseUrl: "http://localhost:8000/api",
            form: {
                token: null
            }
        };
    },
    methods: {
        handleForm() {
            axios
                .post(`${this.baseUrl}/token`, this.form)
                .then(res => {})
                .catch(() => {});
        }
    }
};
</script>
