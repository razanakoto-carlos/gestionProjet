
const filterSelect = document.getElementById("filter");
const tableBody = document.getElementById("project-table-body");

// Function to filter projects
function filterProjects() {
    const selectedFilter = filterSelect.value;
    const rows = tableBody.querySelectorAll("tr");

    rows.forEach(row => {
        // Get the data-project attribute
        const dataProject = row.getAttribute("data-project");
        const dataPaiement = row.getAttribute("data-paiement");

        // If data-project exists, proceed with filtering
        if (dataProject || dataPaiement) {
            try {
                const project = JSON.parse(dataProject);
                const paiement = JSON.parse(dataPaiement);

                let showRow = false;

                // Apply the filters based on selected filter
                if (selectedFilter === "aucun") {
                    showRow = true;
                } else if (selectedFilter === "valide") {
                    showRow = project &&
                        project.r_rse === 1 &&
                        project.r_rsenv === 1 &&
                        project.r_bm === 1 &&
                        project.r_raf === 1 &&
                        project.r_rai === 1 &&
                        project.r_cp === 1 &&
                        project.r_dp === 1;
                } else if (selectedFilter === "enCours") {
                    showRow = project && (
                        project.r_rse === 0 ||
                        project.r_rsenv === 0 ||
                        project.r_bm === 0 ||
                        project.r_raf === 0 ||
                        project.r_rai === 0 ||
                        project.r_cp === 0 ||
                        project.r_dp === 0);
                } else if (selectedFilter === "nonValide") {
                    showRow = project && (
                        project.r_rse === 2 ||
                        project.r_rsenv === 2 ||
                        project.r_bm === 2 ||
                        project.r_raf === 2 ||
                        project.r_rai === 2 ||
                        project.r_cp === 2 ||
                        project.r_dp === 2);
                } else if (selectedFilter === "paiementValide") {
                    showRow = paiement &&
                        paiement.p_rse === 1 &&
                        paiement.p_rpm === 1 &&
                        paiement.p_raf === 1 &&
                        paiement.p_rai === 1 &&
                        paiement.p_cp === 1 &&
                        paiement.p_cpt === 1 &&
                        paiement.p_ca === 1;
                } else if (selectedFilter === "paiementEnCours") {
                    showRow = paiement &&
                        (paiement.p_rse === 0 ||
                            paiement.p_rpm === 0 ||
                            paiement.p_raf === 0 ||
                            paiement.p_rai === 0 ||
                            paiement.p_cp === 0 ||
                            paiement.p_cpt === 0 ||
                            paiement.p_ca === 0);
                } else if (selectedFilter === "paiementNonValide") {
                    showRow = paiement &&
                        (paiement.p_rse === 2 ||
                            paiement.p_rpm === 2 ||
                            paiement.p_raf === 2 ||
                            paiement.p_rai === 2 ||
                            paiement.p_cp === 2 ||
                            paiement.p_cpt === 2 ||
                            paiement.p_ca === 2);
                }

                // Show or hide the row based on the filter
                row.style.display = showRow ? "" : "none";
            } catch (e) {
                console.error("Invalid JSON in data-project for row", row, e);
                row.style.display = "none";
            }
        } else {
            // Skip rows without data-project
            row.style.display = "none";
        }
    });
}

// Event listener to handle filter change
filterSelect.addEventListener("change", filterProjects);

// Initial filtering on page load
filterProjects();
