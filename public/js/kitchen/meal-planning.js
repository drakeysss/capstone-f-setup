
    const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];






    function showWeek(week) {
        const tbody = document.getElementById('week-rows');
        tbody.innerHTML = '';
        
        // Update button states
        document.querySelectorAll('.btn-group .btn').forEach((btn, index) => {
            if (index + 1 === week) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });

        weekMenus[week].forEach((meals, i) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="text-primary fw-bold bg-light text-center py-3">${days[i]}</td>
                ${meals.map(item => {
                    const hasRecipe = recipes[item] !== undefined;
                    return `<td class="text-center py-3">
                        ${item ? `
                            <div class="d-flex align-items-center justify-content-center gap-2">
                                <span class="small text-muted">${item}</span>
                                ${hasRecipe ? `
                                    <button class="btn btn-link btn-sm p-0 text-primary" 
                                            onclick="showRecipe('${item}')" 
                                            title="View Recipe">
                                        <i class="bi bi-book"></i>
                                    </button>
                                ` : ''}
                            </div>
                        ` : '<span class="text-danger">-</span>'}
                    </td>`;
                }).join('')}
            `;
            tbody.appendChild(row);
        });
    }

    // Show initial week
    document.addEventListener('DOMContentLoaded', () => {
        showWeek(1);
    });
