describe('Signup Form Test', () => {

    beforeEach(() => {

        cy.visit('http://localhost/EasyShare/register.php') // navigate to the register page
        cy.wait(1000) // wait for 1 second

    });

    it('should display the registration form', () => {


        // Check if the first name input exists
        cy.get('[name="first_name"]').should('be.visible');
        cy.wait(1000);


        // Check if the last name input exists
        cy.get('[name="last_name"]').should('be.visible');
        cy.wait(1000);


        // Check if the email input exists
        cy.get('[name="email"]').should('be.visible');
        cy.wait(1000);


        // Check if the password input exists
        cy.get('[name="password"]').should('be.visible');
        cy.wait(1000);


        // Check if the retype password input exists
        cy.get('[name="confirm_password"]').should('be.visible');
        cy.wait(1000);

        // Check if the register button exists
        cy.get('button[name="register"]').should('be.visible');

    });

    it('If already have an Account navigate to the Login page', () => {

        /// go the the login page
        cy.get('#login_page').click();
        cy.wait(1000);

        /// verifying url exist
        cy.url().should('include', 'index.php');

    });


    it('should show an error message for empty fields', () => {

        // Click the login button without entering email and password
        cy.get('button[name="register"]').click();
        cy.wait(1000); // Wait for 1 second


    });


    it('should show error if password and retype-password not matching', () => {



        // type first name
        cy.get('[name="first_name"]').type('Ariful');
        cy.wait(1000);


        // type  the last name input
        cy.get('[name="last_name"]').type('Islam');
        cy.wait(1000);


        // Type Email
        cy.get('[name="email"]').type('arifulislam758143@gmail.com');
        cy.wait(1000);


        // Check if the password input exists
        cy.get('[name="password"]').type('123456');
        cy.wait(1000);


        // Check if the retype password input exists
        cy.get('[name="confirm_password"]').type('12345');
        cy.wait(1000);

        cy.get('button[name="register"]').click();

        cy.wait(1000);


    });
    it('should show error if email is not standard email', () => {



        // type first name
        cy.get('[name="first_name"]').type('Ariful');
        cy.wait(1000);


        // type  the last name input
        cy.get('[name="last_name"]').type('Islam');
        cy.wait(1000);


        // Type Email
        cy.get('[name="email"]').type('@gmail.com');
        cy.wait(1000);


        // Check if the password input exists
        cy.get('[name="password"]').type('123456');
        cy.wait(1000);


        // Check if the retype password input exists
        cy.get('[name="confirm_password"]').type('123456');
        cy.wait(1000);

        cy.get('button[name="register"]').click();

        cy.wait(1000);


    });
    it('Show erroe if email is already exist!', () => {



        // type first name
        cy.get('[name="first_name"]').type('Ariful');
        cy.wait(1000);


        // type  the last name input
        cy.get('[name="last_name"]').type('Islam');
        cy.wait(1000);


        // Type Email
        cy.get('[name="email"]').type('arifulislam758143@gmail.com');
        cy.wait(1000);


        // Check if the password input exists
        cy.get('[name="password"]').type('123456');
        cy.wait(1000);


        // Check if the retype password input exists
        cy.get('[name="confirm_password"]').type('123456');
        cy.wait(1000);

        cy.get('button[name="register"]').click();

        cy.wait(1000);


    });

    it('Register with all valid input!', () => {



        // type first name
        cy.get('[name="first_name"]').type('Ariful');
        cy.wait(1000);


        // type  the last name input
        cy.get('[name="last_name"]').type('Islam');
        cy.wait(1000);


        // Type Email
        cy.get('[name="email"]').type('aaa@gmail.com');
        cy.wait(1000);


        // Check if the password input exists
        cy.get('[name="password"]').type('123456');
        cy.wait(1000);


        // Check if the retype password input exists
        cy.get('[name="confirm_password"]').type('123456');
        cy.wait(1000);

        cy.get('button[name="register"]').click();

        cy.wait(1000);


    });



});