import "./bootstrap";

document.addEventListener("alpine:init", () => {
    Alpine.data("orderForm", (isAuth = false) => ({
        step: 1,
        step1Valid: false,
        step3Valid: false,

        init() {
            Livewire.hook("morph.updated", () => this.validateAll(isAuth));
            Livewire.hook("element.updated", () => this.validateAll(isAuth));

            this.validateAll(isAuth);
        },

        validateAll(isAuth) {
            this.validateStep1(isAuth);
            this.validateStep3();
        },

        validateStep1(isAuth) {
            const email = this.$wire.get("email");
            const assignment = this.$wire.get("assignment_type_id");
            const service = this.$wire.get("service_id");
            const level = this.$wire.get("academic_level_id");
            const subject = this.$wire.get("subject_id");
            const language = this.$wire.get("language_id");
            const style = this.$wire.get("style_id");
            const topic = this.$wire.get("topic");
            const words = parseInt(this.$wire.get("words") || 0);

            const emailValid =
                isAuth || (typeof email === "string" && email.trim() !== "");

            this.step1Valid =
                emailValid &&
                !!assignment &&
                !!service &&
                !!level &&
                !!subject &&
                !!language &&
                !!style &&
                !!topic &&
                topic.trim() !== "" &&
                words >= 275;
        },

        validateStep3() {
            const instructions = this.$wire.get("instructions") || "";
            const files = this.$wire.get("files") || [];

            const hasInstructions =
                instructions && instructions !== "<p><br></p>";
            const hasFiles = Array.isArray(files) && files.length > 0;

            this.step3Valid = hasInstructions && hasFiles;
        },
    }));
});
