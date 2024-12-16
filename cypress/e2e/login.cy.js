describe('Login Form Tests', () => {
    beforeEach(() => {


        // Visit the login page
        cy.visit('http://localhost/EasyShare/index.php'); // Replace with the actual path to your HTML file
        cy.wait(1000); // Wait for 1 second
    });

    it('should display the login form', () => {

        // Check if the email input exists
        cy.get('input[name="user_name"]').should('be.visible');
        cy.wait(1000); // Wait for 1 second

        // Check if the password input exists
        cy.get('input[name="pass"]').should('be.visible');
        cy.wait(1000); // Wait for 1 second

        // Check if the login button exists
        cy.get('button[name="btn"]').should('be.visible');
    });


    it('If no Account exist,should navigate to the registration page', () => {

        // Click the sign-up link
        cy.get('a[href="register.php"]').click();
        cy.wait(1000); // Wait for 1 second

        // Verify redirection to the registration page
        cy.url().should('include', 'register.php');
    });

    it('should show an error message for empty fields', () => {

        // Click the login button without entering email and password
        cy.get('button[name="btn"]').click();
        cy.wait(1000); // Wait for 1 second

        // Check for error message (assuming it's displayed dynamically)
        cy.get('h4').should('contain.text', 'Incorrect Username Or Password');
    });


    it('should submit the form with valid credentials', () => {

        // Enter valid email and password
        cy.get('input[name="user_name"]').type('arifulislam758143@gmail.com');
        cy.wait(1000); // Wait for 1 second
        cy.get('input[name="pass"]').type('123456');
        cy.wait(1000); // Wait for 1 second

        // Click the login button
        cy.get('button[name="btn"]').click();
        cy.wait(1000); // Wait for 1 second

    });

});
