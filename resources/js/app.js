import "./bootstrap";

document.addEventListener("alpine:init", () => {
    Alpine.data("orderForm", (isAuth = false) => ({
        step: 1,
        step1Valid: false,
        step3Valid: false,
        hookRegistered: false,
        storageKey: "bullwrite_order_form",

        init() {
            this.restoreFromStorage();
            this.validateAll(isAuth);

            if (window.location.pathname.includes("/thankyou")) {
                this.clearStorage();
                console.log(
                    "🧹 Cleared stored order form after successful order."
                );
            }

            // Livewire hooks
            if (!this.hookRegistered) {
                this.hookRegistered = true;

                Livewire.hook("morph.updated", () => {
                    setTimeout(() => {
                        if (document.body.contains(this.$root)) {
                            this.validateAll(isAuth);
                            this.saveToStorage();
                        }
                    }, 50);
                });

                Livewire.hook("element.updated", () => {
                    setTimeout(() => {
                        if (document.body.contains(this.$root)) {
                            this.validateAll(isAuth);
                            this.saveToStorage();
                        }
                    }, 50);
                });
            }

            // watchers
            this.$watch("step", () => this.saveToStorage());
            this.$watch("step1Valid", () => this.saveToStorage());
            this.$watch("step3Valid", () => this.saveToStorage());

            window.addEventListener("beforeunload", () => this.saveToStorage());
        },

        saveToStorage() {
            const data = {
                step: this.step,
                step1Valid: this.step1Valid,
                step3Valid: this.step3Valid,
                fields: {
                    email: this.$wire.get("email"),
                    assignment_type_id: this.$wire.get("assignment_type_id"),
                    service_id: this.$wire.get("service_id"),
                    academic_level_id: this.$wire.get("academic_level_id"),
                    subject_id: this.$wire.get("subject_id"),
                    language_id: this.$wire.get("language_id"),
                    style_id: this.$wire.get("style_id"),
                    topic: this.$wire.get("topic"),
                    words: this.$wire.get("words"),
                    deadline_option: this.$wire.get("deadline_option"),
                    selectedAddons: this.$wire.get("selectedAddons"),
                    instructions: this.$wire.get("instructions"),
                },
            };

            localStorage.setItem(this.storageKey, JSON.stringify(data));
        },

        restoreFromStorage() {
            const saved = localStorage.getItem(this.storageKey);
            if (!saved) return;

            try {
                const data = JSON.parse(saved);
                this.step = data.step || 1;
                this.step1Valid = data.step1Valid || false;
                this.step3Valid = data.step3Valid || false;

                const f = data.fields || {};
                Object.entries(f).forEach(([key, val]) => {
                    if (val !== undefined && val !== null) {
                        this.$wire.set(key, val);
                    }
                });

                if (f.instructions && window.Quill) {
                    setTimeout(() => {
                        document
                            .querySelectorAll("[x-ref='quillEditor']")
                            .forEach((el) => {
                                const q = el.__quill;
                                if (q) q.root.innerHTML = f.instructions;
                            });
                    }, 500);
                }

                setTimeout(() => {
                    this.$wire.call("calculatePrice");
                }, 800);
            } catch (err) {
                console.error("Failed to restore form:", err);
            }
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

        clearStorage() {
            localStorage.removeItem(this.storageKey);
        },
    }));
});

document.addEventListener("DOMContentLoaded", () => {
    const path = window.location.pathname;

    if (path.includes("/payment/success")) {
        localStorage.removeItem("bullwrite_order_form");
        console.log("🧹 Cleared stored order form after successful payment.");
    }
});
