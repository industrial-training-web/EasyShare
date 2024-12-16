import 'cypress-file-upload';


describe('File Upload Form Tests', () => {
    beforeEach(() => {
        // Visit the page containing the login form
        cy.visit('http://localhost/EasyShare/index.php');
    });

    it('should login with valid credentials and upload a file with a resource title', () => {
        // Step 1: Login with valid credentials
        cy.get('input[name="user_name"]').type('arifulislam758143@gmail.com');
        cy.wait(1000); // Wait for 1 second
        cy.get('input[name="pass"]').type('123456');
        cy.wait(1000); // Wait for 1 second
        cy.get('button[name="btn"]').click();
        cy.wait(1000); // Wait for 1 second

        // Verify successful login (e.g., by checking redirection or presence of an element)
        cy.url().should('include', '/all_share.php'); // Replace '/dashboard' with the URL/path shown after login
        cy.wait(1000); // Wait for 1 second

        // Step 2: Navigate to the file upload page
        cy.visit('http://localhost/EasyShare/my_share.php'); // Replace with the correct upload page URL
        cy.wait(1000); // Wait for 1 second


        cy.get('#upload_modal_button').click();


        // Step 3: Upload a file with a resource title
        cy.get('input[name="resourceTiitle"]').type('Resource Title-1');
        cy.wait(1000);

        cy.get('#fileInput').click();
        // Select a file to upload
        const filePath = '../fixtures/sample.jpg'; //  test file in cypress/fixtures folder
        cy.get('input[name="fileToUpload"]').attachFile(filePath);

        cy.wait(1000);

        // Submit the form
        cy.get('button[name="submit"]').click();
        cy.wait(1000);

    });
});
