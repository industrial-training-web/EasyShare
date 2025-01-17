describe('load test', () => {
  it('visit the page', () => {
    cy.visit('http://localhost:8080/');
    cy.once('uncaught:exception', () => false);
  });
  it('some text assertion', () => {
    cy.visit('http://localhost:8080/');
    cy.once('uncaught:exception', () => false);
    // Welcome to XAMPP for Linux 8.2.12
    cy.contains('Welcome to XAMPP for Linux 8.2.12');
  });
});