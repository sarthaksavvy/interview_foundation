<template>
    <div>
        <TokenForm user="user" />
        <StarredRepos user="user" />
    </div>
</template>

<script>
import TokenForm from "./TokenForm";
import StarredRepos from "./StarredRepos";
export default {
    props: ["user"],
    components: { TokenForm, StarredRepos }
};
</script>

<style></style>
