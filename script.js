document.addEventListener('DOMContentLoaded', function () {
    const loginContainer = document.querySelector('.login-container');
    const mainContainer = document.querySelector('.main-container');
    const logoutButton = document.querySelector('.logout');

    mainContainer.style.display = 'none';

    document.getElementById('login-form').addEventListener('submit', function (event) {
        event.preventDefault(); 
        
        loginContainer.style.display = 'none';
        mainContainer.style.display = 'block';
        fetchCandidates();
    });

    fetchCandidates();

    logoutButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent default link behavior
        
        window.location.href = 'index.html';
    });
});

function fetchCandidates() {
    const candidates = [
        { CandidateID: 1, Name: 'John Doe', Email: 'johnd@gmail.com', Phone: '123-456-7890', Status: 'New', TFFC: 'open to move for work' },
        { CandidateID: 2, Name: 'Alice Johnson', Email: 'alice@gmail.com', Phone: '456-789-0123', Status: 'InReview', TFFC: '' },
        { CandidateID: 3, Name: 'Bob Brown', Email: 'bob@gmail.com', Phone: '789-012-3456', Status: 'Interviewed', TFFC: '' },
        { CandidateID: 4, Name: 'Emily Davis', Email: 'emilyDavis@gmail.com', Phone: '321-654-9870', Status: 'AppliedForJob', TFFC: '' },
        { CandidateID: 5, Name: 'Jane Smith', Email: 'smithjane@gmail.com', Phone: '987-654-3210', Status: 'New', TFFC: '' }
    ];

    const candidatesList = document.getElementById('candidates-list');

    candidatesList.innerHTML = '';

    candidates.forEach(candidate => {
        const candidateDiv = document.createElement('div');
        candidateDiv.classList.add('candidate');

        candidateDiv.innerHTML = "
            <p style='color:red;'><strong>Name:</strong> ${candidate.Name}</p>
            <><p><strong>Email:</strong> ${candidate.Email}</p><p><strong>Phone:</strong> ${candidate.Phone}</p><p><strong>Status:</strong> ${candidate.Status}</p><p><strong>TFFC:</strong> ${candidate.TFFC}</p></>  ";
        document.getElementById("candidateDiv").style.color = "green";

        candidatesList.appendChild(candidateDiv);
    }
    );
}
