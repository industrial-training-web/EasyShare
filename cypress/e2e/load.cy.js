describe('load test', () => {
  it('visit the page', () => {
    cy.visit('http://localhost:8080/');
    cy.once('uncaught:exception', () => false);
  });
});