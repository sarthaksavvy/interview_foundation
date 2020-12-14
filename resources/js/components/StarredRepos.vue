<template>
    <div class="card mt-2">
        <div class="card-header">Starred Repos</div>

        <div class="card-body">
            <h3>Fetch Starred Repos</h3>
            <b-button v-if="isLoading">
                Getting Your Data
            </b-button>
            <b-button
                v-else
                variant="outline-primary"
                :disabled="user.token == null"
                @click.prevent="fetchRepos"
            >
                Get Starred Repos
            </b-button>
        </div>
        <b-toast id="error-toast" title="BootstrapVue" static no-auto-hide>
            Hello, world! This is a toast message.
        </b-toast>
    </div>
</template>

<script>
export default {
    props: ["user"],
    data() {
        return {
            github_url: "",
            isLoading: false,
            starredRepos: []
        };
    },
    mounted() {
        this.showToast();
    },
    methods: {
        fetchRepos() {
            this.isLoading = true;
            axios
                .post(`${this.github_url}`)
                .then(res => {
                    this.starredRepos = res.data;
                    this.isLoading = false;
                })
                .catch(() => {
                    this.isLoading = false;
                });
        },
        showToast() {
            this.$bvToast.toast("This is some issue", {
                title: "Error in fetching repos",
                autoHideDelay: 5000
            });
        }
    }
};
</script>

<style></style>
